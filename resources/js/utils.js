import isEmpty from "lodash/isEmpty"
import head from "lodash/head"

// 
function currency(value){
    return "₹"+Number(value).toFixed(2);
}

function scale(value , digits = 2){
    return Number(value).toFixed(digits)
}

function showProductPrice(product){
        if(isEmpty(product.attributes)){
            return "N/A";
        }else{
            let attribute = head(product.attributes);
            if(isEmpty(attribute.discounted_mrp) || attribute.discounted_mrp == 0)
                return "₹"+Number(attribute.mrp).toFixed(2);
            else
                return "₹"+Number(attribute.discounted_mrp).toFixed(2);
        }
}

let slickCarouselConfig = {
                                dots: false,
                                arrows: true,
                                infinite: true,
                                speed: 300,
                                slidesToShow: 5,
                                slidesToScroll: 1,
                                autoplay: true,
                                prevArrow: "<button type='button' class='slick-prev pull-left'><i class='bi bi-chevron-left'></i></button>",
                                nextArrow: "<button type='button' class='slick-next pull-right'><i class='bi bi-chevron-right'></i></button>",
                                responsive: [
                                    {
                                        breakpoint: 1025,
                                        settings: {
                                            slidesToShow: 4,
                                            slidesToScroll: 1,
                                            infinite: true,
                                        }
                                    },
                                    {
                                        breakpoint: 769,
                                        settings: {
                                            slidesToShow: 3,
                                            slidesToScroll: 1,
                                            arrows: false,
                                        }
                                    },
                                    {
                                        breakpoint: 500,
                                        settings: {
                                            slidesToShow: 2,
                                            slidesToScroll: 2,
                                            arrows: false,
                                        }
                                    }
                                ]
                            };

    function discountedPricePercentage(current, original){ 
                                                            let differnce = original - current;                                                       
                                                            return  Number(( differnce / original ) * 100).toFixed(2);
        }                            


export { currency , scale , showProductPrice , slickCarouselConfig , discountedPricePercentage}