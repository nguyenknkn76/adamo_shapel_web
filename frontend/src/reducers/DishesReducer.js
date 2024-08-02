import { createSlice } from "@reduxjs/toolkit";

const dishesSlice = createSlice({
    name: 'dishes',
    initialState: null,
    reducers:{
        setDishes(state, action){
            return action.payload
        },

    }
})

export const {setDishes} = dishesSlice.actions

export default dishesSlice.reducer