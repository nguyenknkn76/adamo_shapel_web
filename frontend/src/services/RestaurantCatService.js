import axios from "axios";

const baseUrl = `http://localhost:8000/api/restaurant_categories`

const getAll = async () => {
    const res = await axios.get(baseUrl)
    return res.data
}

export default {getAll}