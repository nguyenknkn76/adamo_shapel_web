import ChooseCity from "../components/Selections/ChooseCity"
import ChooseRestaurantCat from "../components/Selections/ChooseRestaurantCat"
import CategoriesTable from "../components/Tables/CategoriesTable"
import CombosTable from "../components/Tables/CombosTable"
import DishesTable from "../components/Tables/DishesTable"
import RestaurantsTable from "../components/Tables/RestaurantsTable"

const HomePage = () => {
    return (
        // * ChooseCity && ChooseResCat => ListRestaurant: Choose Restaurant => ListDishes, ListCombos
        <div>
            <ChooseCity/>
            <ChooseRestaurantCat/>
            <RestaurantsTable/>
            <CategoriesTable/>
            <DishesTable/>
            <CombosTable/>
        </div>
    )
}
export default HomePage