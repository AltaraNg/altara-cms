export default class PriceCalculator {
    static salePlans() {
        return [
            {id: 1, name: "0%", percent: 0},
            {id: 2, name: "20%", percent: 20},
            {id: 3, name: "40%", percent: 40},
            {id: 4, name: "60%", percent: 60},
            {id: 5, name: "80%", percent: 80}
        ];
    }

    static calculatePrice(mPrice, plan) {
        let dPrice,
            rPrice,
            afInt,
            pInt,
            aTax,
            upFront,
            rePay,
            mRepay,
            int,
            totalP,
            downP,
            rPay,
            margin = 0.25,
            finalPriceSummary;

        if (mPrice <= 25000) {
            mPrice = Math.ceil((mPrice * margin) + Number(mPrice));
            int = (parseInt(plan) === 0) ? 3.3 : 3;
            dPrice = Math.ceil(((parseInt(plan) === 0) ? 0 : mPrice * (plan / 100)) / 100) * 100;
            rPrice = Math.ceil((mPrice - dPrice) / 100) * 100;
            afInt = Math.ceil(((rPrice * (int / 100)) * 12) / 100) * 100;
            pInt = Math.ceil((afInt + dPrice + rPrice) / 100) * 100;
            aTax = Math.ceil((((0.05 * pInt) + pInt)) / 100) * 100;
            upFront = Math.ceil(((parseInt(plan) === 0) ? 0 : aTax * (plan / 100)) / 100) * 100;
            rePay = Math.ceil((aTax - upFront) / 100) * 100;
            mRepay = Math.ceil((rePay / 6) / 100) * 100;
            downP = upFront;
            rPay = mRepay;
            totalP = (rPay * 6 + downP);
            finalPriceSummary = {
                repaymentPrice: [rPay],
                totalPrice: [totalP],
                downPayment: [downP],
            };
        } else {
            mPrice = (mPrice * margin) + Number(mPrice);
            int = (parseInt(plan) === 0) ? 3.3 : 3;
            dPrice = (parseInt(plan) === 0) ? 0 : mPrice * (plan / 100);
            rPrice = mPrice - dPrice;
            afInt = (rPrice * (int / 100)) * 12;
            pInt = afInt + dPrice + rPrice;
            aTax = ((0.05 * pInt) + pInt);
            upFront = (parseInt(plan) === 0) ? 0 : aTax * (plan / 100);
            rePay = aTax - upFront;
            mRepay = (rePay / 6);
            downP = Math.floor(upFront / 100) * 100;
            rPay = Math.floor(mRepay / 100) * 100;
            totalP = (rPay * 6 + downP);
            finalPriceSummary = {
                repaymentPrice: [rPay],
                totalPrice: [totalP],
                downPayment: [downP],
            };
        }

        return finalPriceSummary;
    }
}
