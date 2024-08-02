import { useEffect, useState } from "react"
import { useDispatch, useSelector } from "react-redux"
import { setUsers } from "../../reducers/UserReducer"
import User from "../../../../../Frontend/for-fdemo/src/components/Users/User"
import UserService from "../../services/UserService"
import axios from "axios"


const RestaurantAPI =  () => {
    // const restaurants =  useSelector(state => state.restaurants)
    const dispatch = useDispatch()
    const [restaurants, setRestaurants] = useState([]);
    useEffect(() => {
        // UserService
        //     .getAll()
        //     .then(allUsers => {
        //         dispatch(setUsers(allUsers))
        //         console.log(allUsers)
        //     })

        axios.get('http://localhost:8000/api/restaurants')
            .then(res => res.data)
            .then(res => setRestaurants(res))
    },[])

    return(
        <div>
            this is restaurants api
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Address</th>
                    </tr>
                </thead>
                <tbody>
                    {       
                        restaurants?.map(restaurant =>     
                            <tr key={restaurant.id}>
                                <td>{restaurant.name}</td>
                                <td>{restaurant.address}</td>
                            </tr>
                        )
                    }
                    
                </tbody>
            </table>    
        </div>
    )
}
export default RestaurantAPI
