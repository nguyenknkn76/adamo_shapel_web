import { useDispatch, useSelector } from "react-redux"
import DishService from "../../services/DishService"
import { useEffect } from "react"
import { setDishes } from "../../reducers/DishesReducer"

const DishesTable = () => {
    // const [dishes, setDishes] = useState([])
    const dishes = useSelector(state => state.dishes)
    const dispatch = useDispatch()
    const restaurant_category = useSelector(state => state.restaurant_category)
    const restaurant = useSelector(state => state.restaurant)

    useEffect(() =>{
        // DishService
        //     .getAll()
        //     .then(res => dispatch(setDishes(res)))
        if(restaurant){
            DishService
                .getByRestaurantId(restaurant.id)
                .then(res=> dispatch(setDishes(res)))
        }
    },[restaurant])

    const handleChooseDish = (dish) => {
        console.log(dish)
        // dispatch(setCategory(category))
    }

    return(
        <div>
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                    </tr>
                </thead>
                <tbody>
                    {       
                        dishes?.map(d =>     
                            <tr key={d.id}>
                                <td>{d.name}</td>
                                <td >
                                    <button onClick={() => handleChooseDish(d)}>Choose</button>
                                </td>
                            </tr>
                        )
                    }
                </tbody>
            </table>  
        </div>
    )
}

export default DishesTable