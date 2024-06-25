import React from "react";
import Navigation from "../components/Navigation";
import GetProducts from "../components/GetProducts";
import { NavLink } from "react-router-dom";
import SearchBar from "../components/SearchBar";

const Products = () => {
  return (
    <>
      <div>
        <div>
          <Navigation />
          <SearchBar />
          <br />
          <br />
          <NavLink to={"/products/create"}>
            <button style={{ backgroundColor: "green", color: "white" }}>
              Ajouter produit
            </button>
          </NavLink>
        </div>{" "}
        <br />
        <GetProducts />
      </div>
    </>
  );
};
export default Products;
