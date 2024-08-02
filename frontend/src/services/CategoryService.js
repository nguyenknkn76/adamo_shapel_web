import axios from "axios";

const baseUrl = `http://localhost:8000/api/categories`

const getAll = async () => {
    const res = await axios(baseUrl)
    return res.data
}

export default {getAll}