import { useEffect, useState } from "react";
import axios from "axios";

const SearchBar = () => {
  const [categories, setCategories] = useState([]);
  const [products, setProducts] = useState([]);
  const [productsRecords, setProductsRecords] = useState(products, categories);

  useEffect(() => {
    Categories();
    Products();
  }, []);

  const filterData = (e) => {
    setProductsRecords(
      products.filter((product) =>
        product.name.toLowerCase().includes(e.target.value)
      )
    );
  };

  const Products = () => {
    axios
      .get("http://127.0.0.1:8000/api/v1/products")
      .then((response) => {
        console.log(response);
        setProducts(response.data);
      })
      .catch((error) => {
        console.log(error);
      });
  };

  const Categories = () => {
    axios
      .get("http://127.0.0.1:8000/api/v1/categories")
      .then((response) => {
        console.log(response);
        setCategories(response);
      })
      .catch((error) => {
        console.log(error);
      });
  };

  return (
    <>
      <input
        name="searchBar"
        type="text"
        placeholder="Search"
        onChange={filterData}
      />
      {/* <div>
        {productsRecords.map((product, e) => (
          <div key={product.id}>
            <p>{product.name}</p>
          </div>
        ))}
      </div> */}
    </>
  );
};
export default SearchBar;
