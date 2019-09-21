import {PriceCalculator} from "./PriceCalculator";

class Product {

    constructor(product) {
        this._product = product;
        this.calcPriceSummary(40);
    }

    get product() {
        return this._product;
    }

    calcPriceSummary(salesPlan) {
        this._priceSummary = PriceCalculator.calculatePrice(parseInt(this.product.retail_price), parseInt(salesPlan))
    }

    get priceSummary() {
        return this._priceSummary
    }
}

export {Product}