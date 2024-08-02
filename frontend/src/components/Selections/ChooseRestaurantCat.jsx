import { useEffect, useState } from "react"
import { useDispatch, useSelector } from "react-redux"
import RestaurantCatService from "../../services/RestaurantCatService"
import { setRestaurantCat } from "../../reducers/RestaurantCatReducer"

const ChooseRestaurantCat = () => {

    // const restaurant_category = useSelector(state => state.restaurant_category)
    const dispatch = useDispatch()
    const [restaurant_categories, setRestaurantCategories] = useState([])

    const fetchResCat =  async () => {
        await RestaurantCatService
            .getAll()
            .then(res => {
                setRestaurantCategories(res)
            })
    }
    useEffect(()=> {
        fetchResCat()
        console.log("effect",restaurant_categories)
    },[])

    const handleSelectRestaurantCat = (event) => {
        const id = Number(event.target.value)
        const selectedCat = restaurant_categories.find(cat => cat.id === id);
        // console.log(selectedCat)
        if (selectedCat) {
            dispatch(setRestaurantCat(selectedCat));
        }
    };
    return(
        <div>
            <label htmlFor="chooserescat">Choose restaurant-category:</label>
            <select id="chooserescat" name="chooserescat" onChange={handleSelectRestaurantCat}>
                {
                    restaurant_categories?.map(rescat => 
                        <option key={rescat.id} value={rescat.id}>{rescat.name}</option>
                    )
                }
            </select>
        </div>
    )
}

export default ChooseRestaurantCat