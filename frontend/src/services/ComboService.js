import axios from "axios";

const baseUrl = `http://localhost:8000/api/combos`

const getAll = async () => {
    const res = await axios.get(baseUrl)
    return res.data
}

const getByRestaurantId = async (restaurant_id) => {
    const res = await axios.get(`${baseUrl}/restaurant_id/${restaurant_id}`)
    return res.data
}

export default {getAll, getByRestaurantId}