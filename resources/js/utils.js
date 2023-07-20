import isEmpty from "lodash/isEmpty"
import head from "lodash/head"
import moment from 'moment'
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

function displayPrice(amount){
    return "₹"+ Number(amount).toFixed(2)
}


function displayPriceHtml(product){        
        if(!isEmpty(product.attributes)){
            let attribute = head(product.attributes);
            if(attribute.discounted_mrp == 0){
                 return `<div class="fs-6 me-1  mb-0 fw-bold">${displayPrice(attribute.mrp)}</div>`;            
            }else{
               return `<div class="mb-0 me-1 fw-light fw-bold text-secondary text-decoration-line-through">${displayPrice(attribute.discounted_mrp)}</div> ` +
                `<div class="mb-0 fw-bold">${displayPrice(attribute.mrp)}</div> <div class="small fw-bold text-danger">(${discountedPricePercentage(attribute.discounted_mrp,attribute.mrp)}% off)</div>`;            
            }            
        }else{
            return 'N/A';
        }        
}

function displayAttributePriceHtml(attribute){ 
    if(attribute.discounted_mrp == 0){
            return `<div class="fs-6 me-1  mb-0 fw-bold">${displayPrice(attribute.mrp)}</div>`;            
    }else{
        return `<div class="mb-0 me-1 fw-light fw-bold text-secondary text-decoration-line-through">${displayPrice(attribute.discounted_mrp)}</div> ` +
        `<div class="mb-0 fw-bold">${displayPrice(attribute.mrp)}</div> <div class="small fw-bold text-danger">(${discountedPricePercentage(attribute.discounted_mrp,attribute.mrp)}% off)</div>`;            
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

    function displayDate($date , $format = "MMM Do YY"){
        return moment($date).format($format);
    }


export { currency , scale , showProductPrice , slickCarouselConfig , discountedPricePercentage, displayPriceHtml, displayPrice , displayDate , displayAttributePriceHtml}