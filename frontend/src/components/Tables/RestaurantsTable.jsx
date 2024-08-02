import { useEffect, useState } from "react"
import { useDispatch, useSelector } from "react-redux"
import RestaurantService from "../../services/RestaurantService"
import { setRestaurant } from "../../reducers/RestaurantReducer"

const RestaurantsTable = () => {
    const restaurant_category = useSelector(state => state.restaurant_category)
    const restaurant = useSelector(state=> state.restaurant)
    const city = useSelector(state => state.city)
    const [restaurants, setRestaurants] = useState([])
    const dispatch = useDispatch()
    useEffect(() => {
        if(restaurant_category && city){
            RestaurantService
                .getAll(city.id, restaurant_category.id)
                .then(res => setRestaurants(res))
        }
    },[restaurant_category])
    // console.log('res',restaurants)
    const handleChooseRestaurant = (restaurant) => {
        dispatch(setRestaurant(restaurant))
    }
    return(
        <div>
            this is restaurants
            <ul>
                {
                    restaurants?.map(restaurant => 
                        <li key={restaurant.id} onClick={() => handleChooseRestaurant(restaurant)}>{restaurant.name}</li>
                    )
                }
            </ul>
        </div>
    )
}

export default RestaurantsTable