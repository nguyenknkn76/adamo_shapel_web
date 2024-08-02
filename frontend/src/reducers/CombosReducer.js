import { createSlice } from "@reduxjs/toolkit";

const combosSlice = createSlice({
    name: 'combos',
    initialState: null,
    reducers:{
        setCombos(state, action){
            return action.payload
        },

    }
})

export const {setCombos} = combosSlice.actions

export default combosSlice.reducer