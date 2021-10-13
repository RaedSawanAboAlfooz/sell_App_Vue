const { default: axios } = require("axios");

var Product = {
    // category id
    async getProducts(id) {
        var res = await axios.get("/api/products?id=" + id);
        return res;
    }
};
export { Product };
