import { useEffect, useState } from "react"
import CategoryService from "../../services/CategoryService"
import { useDispatch, useSelector } from "react-redux"
import { setCategory } from "../../reducers/CategoryReducer"

const CategoriesTable = () => {
    const [categories, setCategories] = useState([])
    const category = useSelector(state => state.category)
    const dispatch = useDispatch()

    useEffect(() =>{
        CategoryService
            .getAll()
            .then(res => setCategories(res))
    },[])

    const handleChooseCategory = (category) => {
        console.log(category)
        dispatch(setCategory(category))
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
                        categories?.map(c =>     
                            <tr key={c.id}>
                                <td>{c.name}</td>
                            </tr>
                        )
                    }
                    
                </tbody>
                    
                
            </table>  
        </div>
    )
}
export default CategoriesTable