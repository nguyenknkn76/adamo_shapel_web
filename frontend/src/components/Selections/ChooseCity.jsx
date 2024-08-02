import { useEffect, useState } from "react"
import CityService from "../../services/CityService"
import { useDispatch, useSelector } from "react-redux"
import { setCity } from "../../reducers/CityReducer"

const ChooseCity = () => {
    // const [city, setCity] = useState(null)
    // const city = useSelector(state => state.city)
    const dispatch = useDispatch()
    const [cities, setCities] = useState([])
    // const store = useSelector(state => state)
    // console.log(store)
    useEffect(()=> {
        CityService
            .getAll()
            .then(res => {
                setCities(res)
            })
    },[])

    const handleSelectCity = (event) => {
        const id = Number(event.target.value)
        const selectedCity = cities.find(city => city.id === id);
        if (selectedCity) {
            dispatch(setCity(selectedCity));
        }
    };
    return(
        <div>
            <label htmlFor="choosecity">Choose city:</label>
            <select id="choosecity" name="choosecity" onChange={handleSelectCity}>
                {
                    cities?.map(city => 
                        <option key={city.id} value={city.id}>{city.name}</option>
                    )
                }
            </select>
        </div>
    )
}

export default ChooseCity