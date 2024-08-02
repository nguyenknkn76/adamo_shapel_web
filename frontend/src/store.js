import {configureStore} from '@reduxjs/toolkit'
import { combineReducers } from '@reduxjs/toolkit'
import LoggedinReducer from './reducers/LoggedinReducer'
import UserReducer from './reducers/UserReducer'
import CityReducer from './reducers/CityReducer'
import CategoryReducer from './reducers/CategoryReducer'
import CombosReducer from './reducers/CombosReducer'
import DishesReducer from './reducers/DishesReducer'
import RestaurantCatReducer from './reducers/RestaurantCatReducer'
import RestaurantReducer from './reducers/RestaurantReducer'


const store = configureStore({
    reducer: {
        loggedin: LoggedinReducer,
        users: UserReducer,
        city: CityReducer,
        category: CategoryReducer,
        combos: CombosReducer,
        dishes: DishesReducer,
        restaurant_category: RestaurantCatReducer,
        restaurant: RestaurantReducer
    }
})

console.log(store.getState())

store.subscribe(()=>{
    console.log(store.getState())
})

export default store