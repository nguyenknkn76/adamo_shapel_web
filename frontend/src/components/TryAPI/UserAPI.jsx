import { useEffect } from "react"
import { useDispatch, useSelector } from "react-redux"
import { setUsers } from "../../reducers/UserReducer"
import User from "../../../../../Frontend/for-fdemo/src/components/Users/User"
import UserService from "../../services/UserService"


const UserAPI =  () => {
    const users =  useSelector(state => state.users)
    const dispatch = useDispatch()

    useEffect(() => {
        UserService
            .getAll()
            .then(allUsers => {
                dispatch(setUsers(allUsers))
                console.log(allUsers)
            })
    },[])

    return(
        <div>
            this user api
            <table>
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Email</th>
                    </tr>
                </thead>
                <tbody>
                    {       
                        users?.map(user =>     
                            <tr key={user.id}>
                                <td>{user.name}</td>
                                <td>{user.email}</td>
                            </tr>
                        )
                    }
                    
                </tbody>
                    
                
            </table>    
        </div>
    )
}
export default UserAPI
