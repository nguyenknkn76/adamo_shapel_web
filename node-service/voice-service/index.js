// console.log('you are sus')

// // const textToSpeech = require('@google-cloud/text-to-speech');
// // const fs = require('fs');

// // process.env.GOOGLE_APPLICATION_CREDENTIALS ='smart-setting-431107-r3-9932362685b4.json'

// // const client = new textToSpeech.TextToSpeechClient();

// // async function synthesizeText(text) {
// //     const request = {
// //         input: { text },
// //         voice: { languageCode: 'vi-VN', ssmlGender: 'FEMALE' },
// //         audioConfig: { audioEncoding: 'MP3' },
// //     };

// //     const [response] = await client.synthesizeSpeech(request);
// //     const outputFile = 'output.mp3';
// //     fs.writeFileSync(outputFile, response.audioContent);
// //     console.log(`Audio đã được lưu vào ${outputFile}`);
// // }

// // synthesizeText('Xin chào! Đây là ví dụ về chuyển văn bản thành giọng nói.');
// // synthesizeText('this is sus 2');

// const express = require('express');
// // const path = require('path');
// const app = express();
// const port = 3000;
// const path = require('path');
// const player = require('play-sound')();

// // const filePath = path.join(__dirname, 'voice-service', 'output.mp3');
// app.get('/audio', (req, res) => {
//     res.sendFile('./output.mp3')
// })

// app.listen(port, () => {
//     console.log(`Server is running at http://localhost:${port}`);
//   });
// // try {
// //   player.play('./output.mp3', function(err) {
// //     if (err) {
// //       console.error('Error playing audio:', err);
// //       return;
// //     }
// //     console.log('Audio finished playing');
// //   });
// // } catch (error) {
// //   console.error('Caught an error:', error);
// // }



// // player.play('/LastProj/node-service/voice-service/output.mp3', function(err){
// //     if (err) throw err;
// //     console.log('Audio finished playing');
// // });

const express = require('express');
const fs = require('fs');
const path = require('path');
const app = express();
const port = 3000;

// Đường dẫn đến file MP3
const filePath = './output.mp3';

app.get('/audio', (req, res) => {
    console.log('audio')
  const stat = fs.statSync(filePath);
  const fileSize = stat.size;
  const range = req.headers.range;

  if (range) {
    const parts = range.replace(/bytes=/, "").split("-");
    const start = parseInt(parts[0], 10);
    const end = parts[1] ? parseInt(parts[1], 10) : fileSize - 1;

    if (start >= fileSize) {
      res.status(416).send('Requested range not satisfiable\n' + start + ' >= ' + fileSize);
      return;
    }

    const chunksize = (end - start) + 1;
    const file = fs.createReadStream(filePath, { start, end });
    const head = {
      'Content-Range': `bytes ${start}-${end}/${fileSize}`,
      'Accept-Ranges': 'bytes',
      'Content-Length': chunksize,
      'Content-Type': 'audio/mpeg',
    };

    res.writeHead(206, head);
    file.pipe(res);
  } else {
    const head = {
      'Content-Length': fileSize,
      'Content-Type': 'audio/mpeg',
    };
    res.writeHead(200, head);
    fs.createReadStream(filePath).pipe(res);
  }
  console.log('end')
});

app.listen(port, () => {
  console.log(`Server is running at http://localhost:${port}`);
});

