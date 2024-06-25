import axios from "axios";
import React, { useEffect, useState } from "react";
import { NavLink } from "react-router-dom";
import SearchBar from "./SearchBar";

const GetProducts = () => {
  const [products, setProducts] = useState([]);

  useEffect(() => {
    axios.get("http://127.0.0.1:8000/api/v1/products").then((response) => {
      setProducts(response.data);
      console.log(response);
    });
  }, []);
  const getImageUrl = (image) => {
    if (image) {
      return "http://127.0.0.1:8000/" + image;
    }
  };

  const deleteProduct = (e, id) => {
    e.preventDefault();
    axios
      .delete(`http://127.0.0.1:8000/api/v1/products/${id}`)
      .then((response) => {
        console.log(response);
        alert(response.data.message);
        window.location.reload(false);
      });
  };
  return (
    <>
      <div>
        {/* <input type="range" min="1" max="250" id="" /> */}
        <div className="products">
          {products.slice().map((product) => (
            <div key={product.id} className="product">
              <img
                style={{ width: "200px", height: "100px", marginTop: "5px" }}
                src={getImageUrl(product.image)}
                alt=""
              />
              <p>{product.name}</p>
              <p>{product.description}</p>
              <p>{product.price + " $"}</p>
              <p className="category-name">{product.category}</p>
              <div>
                <NavLink to={`/products/${product.id}/update`}>
                  <button>Modifier</button>
                </NavLink>
                <button
                  onClick={(e) => {
                    deleteProduct(e, product.id);
                  }}
                >
                  Supprimer
                </button>
              </div>
            </div>
          ))}
        </div>
      </div>
    </>
  );
};
export default GetProducts;
