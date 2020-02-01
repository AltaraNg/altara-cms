import PriceCalculator from "./PriceCalculator";

export default class Product {
    constructor(product) {
        this._product = product;
        this.calcPriceSummary(40);
    }

    get product() {
        return this._product;
    }

    get priceSummary() {
        return this._priceSummary
    }

    calcPriceSummary(salesPlan) {
        this._priceSummary = PriceCalculator.calculatePrice(parseInt(this.product.retail_price), parseInt(salesPlan))
    }
}
