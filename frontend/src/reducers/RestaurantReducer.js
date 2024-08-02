import { createSlice } from "@reduxjs/toolkit";

const restaurantSlice = createSlice({
    name: 'restaurant',
    initialState: null,
    reducers:{
        setRestaurant(state, action){
            return action.payload
        },
        // appendUser(state, action){
        //     return state.push(action.payload)
        // }
    }
})

export const {setRestaurant} = restaurantSlice.actions

export default restaurantSlice.reducer