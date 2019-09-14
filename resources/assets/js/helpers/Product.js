import Vue from 'vue';

let vue = new Vue();

class Product {

    constructor(product) {
        this._product = product;
    }

    get product() {
        return this._product;
    }

    get twentyPercentFirstPayment() {
        return this.percentFirstPayment(0.2);
    }

    get twentyPercentRepayment() {
        return Product.getRepaymentForEachPercentage(this.product.twenty_price, 0.2)
    }

    get fortyPercentFirstPayment() {
        return this.percentFirstPayment(0.4);
    }

    get fortyPercentRepayment() {
        return Product.getRepaymentForEachPercentage(this.product.twenty_price, 0.4)
    }

    percentFirstPayment(percent) {
        return Product.formatCurrency(this.product.twenty_price * percent);
    }

    static formatCurrency(price) {
        return vue.$options.filters.currency(price, '₦');
    }

    static getRepaymentForEachPercentage(price, percent) {
        return Product.formatCurrency(Math.round((price - (percent * price)) / 12));
    }
}

export {Product}