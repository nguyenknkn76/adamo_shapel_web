import { useEffect, useState } from "react"
import { useDispatch, useSelector } from "react-redux"
import ComboService from "../../services/ComboService"
import { setCombos } from "../../reducers/CombosReducer"

const ComboDetail = ({showedCombo}) => {
    
    return (
        <div>
            
        </div>
    )
}
const CombosTable = () => {
    const combos = useSelector(state => state.combos)
    const restaurant = useSelector(state => state.restaurant)
    const dispatch = useDispatch()
    // const [showDetail, setShowDetail] = useState(false)
    const [showedCombo, setShowedCombo] = useState(null)
    
    useEffect(() =>{
        if(restaurant){
            ComboService
                .getByRestaurantId(restaurant.id)
                .then(res => dispatch(setCombos(res)))
        } 
    },[restaurant])

    const handleChooseCombo = (combo) => {
        console.log(combo)
        // dispatch(setCategory(category))
    }

    const handleDetailCombo = (combo) => {
        // setShowDetail(true)
        setShowedCombo(combo)
        console.log(combo)
        // showDetail = true
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
                        combos?.map(c =>     
                            <tr key={c.id}>
                                <td>{c.name}</td>
                                <td>
                                    <button onClick={() => handleChooseCombo(c)}>choose</button>
                                </td>
                                <td>
                                    <button onClick={() => handleDetailCombo(c)}>detail</button>
                                </td>
                            </tr>
                        )
                    }
                    
                </tbody>
            </table>  
            {
                showedCombo && <ComboDetail showedCombo = {showedCombo}/>
            }
        </div>
    )
}
export default CombosTable