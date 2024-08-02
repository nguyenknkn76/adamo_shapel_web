import { createSlice } from "@reduxjs/toolkit";

const restaurantCategorySlice = createSlice({
    name: 'restaurant_category',
    initialState: null,
    reducers:{
        setRestaurantCat(state, action){
            return action.payload
        },
        // appendUser(state, action){
        //     return state.push(action.payload)
        // }
    }
})

export const {setRestaurantCat} = restaurantCategorySlice.actions

export default restaurantCategorySlice.reducer