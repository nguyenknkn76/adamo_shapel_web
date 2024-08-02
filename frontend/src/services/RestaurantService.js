import axios from "axios";

const baseUrl = `http://localhost:8000/api/restaurants`

const getAll = async (city_id, restaurant_category_id) => {
    const res = await axios.get(`${baseUrl}?city_id=${city_id}&restaurant_category_id=${restaurant_category_id}`)
    return res.data
}

export default {getAll}