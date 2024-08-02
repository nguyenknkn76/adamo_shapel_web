const textToSpeech = require('@google-cloud/text-to-speech');

process.env.GOOGLE_APPLICATION_CREDENTIALS ='smart-setting-431107-r3-9932362685b4.json'

const client = new textToSpeech.TextToSpeechClient();

const voices = []

const getVoices =  async () => {
    const [result] = await client.listVoices({});
    // console.log("result",result.voices.map(v => v.ssmlGender))
    // console.log("result",result.voices.map(v => v.name))
    let listLC = []

    
    result.voices.map(v => v.languageCodes).forEach(lc => {
        // console.log(listLC.push('hello'))
        // console.log(lc)
        if (!listLC.includes(lc)) {
            // console.log(lc, lislLC.includes(lc));
            // lislLC = [...lislLC, lc]
            // console.log('hello')
        }
    })

    console.log(listLC);
    // const voices = result.voices;
    
}

getVoices();

console.log('Voices:');
voices.forEach(voice => {
  console.log(`Name: ${voice.name}`);
  console.log(`  SSML Voice Gender: ${voice.ssmlGender}`);
  console.log(`  Natural Sample Rate Hertz: ${voice.naturalSampleRateHertz}`);
  console.log('  Supported languages:');
  voice.languageCodes.forEach(languageCode => {
    console.log(` ${languageCode}`);
  });
});

