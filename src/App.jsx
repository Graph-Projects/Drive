import "./App.css";
import { BrowserRouter, Routes, Route } from "react-router-dom";
import Categories from "./pages/Categories";
import Products from "./pages/Products";
import Homepage from "./pages/Homepage";
import CategoriesCreate from "./pages/CategoriesCreate";
import CategoriesUpdate from "./pages/CategoriesUpdate";
import ProductsCreate from "./pages/ProductsCreate";
import ProductsUpdate from "./pages/ProductsUpdate";

function App() {
  return (
    <>
      <BrowserRouter>
        <Routes>
          <Route path="/" element={<Homepage />}></Route>
          <Route path="/categories" element={<Categories />}></Route>
          <Route
            path="/categories/create"
            element={<CategoriesCreate />}
          ></Route>
          <Route
            path="/categories/:id/update"
            element={<CategoriesUpdate />}
          ></Route>
          <Route path="/products" element={<Products />}></Route>
          <Route path="/products/create" element={<ProductsCreate />}></Route>
          <Route
            path="/products/:id/update"
            element={<ProductsUpdate />}
          ></Route>
        </Routes>
      </BrowserRouter>
    </>
  );
}

export default App;
