import { createSlice } from "@reduxjs/toolkit";

const categorySlice = createSlice({
    name: 'category',
    initialState: null,
    reducers:{
        setCategory(state, action){
            return action.payload
        },
        // appendUser(state, action){
        //     return state.push(action.payload)
        // }
    }
})

export const {setCategory} = categorySlice.actions

export default categorySlice.reducer