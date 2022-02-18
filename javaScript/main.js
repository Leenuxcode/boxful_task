/* 
    화면크기변경 event가 발생하고 화면사이즈에 따라 
    공유박스종류 - 콘텐츠 순서 변경
*/
let slide_count = 0;
const slide_top = () => {
        slide_count++;
        console.log();
        switch(slide_count){
            case 1:
                $('.detail_explain_slide_move').css({'transition-duration':'1.2s'});
                $('.detail_explain_slide_move').css({'margin-top':'-585px'});
                break;
            case 3:
                $('.detail_explain_slide_move').css({'margin-top':'-1164px'});
                break;
            case 5:
                $('.detail_explain_slide_move').css({'transition-duration':'0s', 'margin-top':'0px'});
                break;
            case 6:
                slide_count = 0;
                break;
                
        }
}
const slide_left = () => {
    slide_count++;
    console.log(slide_count);
    switch(slide_count){
        case 1:
            $('.detail_explain_slide_move').css({'transition-duration':'1.2s'});
            $('.detail_explain_slide_move').css({'margin-left':'-960px'});
            break;
        case 3:
            $('.detail_explain_slide_move').css({'margin-left':'-1930px'});
            break;
        case 5:
            $('.detail_explain_slide_move').css({'transition-duration':'0s', 'margin-left':'-22px'});
            break;
        case 6:
            slide_count = 0;
            break;
    }
}
this.addEventListener('resize', ()=>{
    const window_width = $(window).width();
        if(window_width < 750){
            /* 공유창고 종류 - 이미지, 정보 순서 변경 */
            $('.share_box_category_self').html(`
                <li class="share_box_category_self--info_wrap">
                    <p class="share_box_category_self_info_sub_title">방문형</p>
                    <p class="share_box_category_self_info_title">셀프스토리지</p>
                    <p class="share_box_category_self_info_pay">장기 보관 시 <br>최대 30% 할인</p>
                </li>
                <li class="share_box_category_self--img"></li>
                <li class="share_box_category_self--detail">
                    <p class="share_box_category_self_detail_text">상세설명</p>
                </li>
            `)
            $('.share_box_category_product').html(`
                <li class="share_box_category_product--info_wrap">
                    <p class="share_box_category_product_info_sub_title">배송형</p>
                    <p class="share_box_category_product_info_title">물품 단위</p>
                    <p class="share_box_category_product_info_pay">월 ₩7500부터 <br>(최소 1개월)</p>
                </li>
                <li class="share_box_category_product--img"></li>
                <li class="share_box_category_product--detail">
                    <p class="share_box_category_product_detail_text">상세설명</p>
                </li>
            `)
            $('.share_box_category_area').html(`
                <li class="share_box_category_area--info_wrap">
                    <p class="share_box_category_area_info_sub_title">배송형</p>
                    <p class="share_box_category_area_info_title">물품 단위</p>
                    <p class="share_box_category_area_info_pay">월 ₩69,000부터 <br>(최소 1개월)</p>
                </li>
                <li class="share_box_category_area--img"></li>
                <li class="share_box_category_area--detail">
                    <p class="share_box_category_area_detail_text">상세설명</p>
                </li>
            `);
            /* 상세설명 스토리지 - 이미지, 정보 순서 변경 */
            $('.detail_explain_self_wrap').html(`
                <ul class="detail_explain_self_info">
                    <div class="detail_explain_self_img"></div>
                    <li class="detail_explain_self_info--title">셀프스토리지</li>
                    <li class="detail_explain_self_info--sub_title">24시간 간편하고 안전하게 나만의 공유창고</li>
                    <li class="detail_explain_self_info--customer_center">
                        <div class="detail_explain_self_info_customer_center_clock"></div>
                        <ul class="detail_explain_self_info_customer_center_info">
                            <li class="detail_explain_self_info_customer_center_info--title">고객센터</li>
                            <li class="detail_explain_self_info_customer_center_info--time">월요일 - 금요일 : 오전 10시 ~ 오후 7시</li>
                            <li class="detail_explain_self_info_customer_center_info--sub_time">(주말 및 공휴일 휴무)</li>
                        </ul>

                        </li>
                        <li class="detail_explain_self_info--apply">
                            <div class="detail_explain_self_info_apply">바로 신청하기</div>
                            
                            <div class="detail_explain_self_info_estn">1초 견적 받기</div>
                        </li>
                    </ul>
                
            `);
            $('.detail_explain_self_wrap').css({'flex-direction':'column','background-repeat':'no-repeat'});
            
            setInterval("slide_top", 1000);
            /* 바이러스 안심 공유창고 */
            $('.security_info_text_a').html('24시간 작동되는 CCTV, 직원 외 출입제한');
            $('.security_info_text_b').html('');
            $('.fire_info_text_a').html('자동 화재 스프링클러, 화재 경보기, 소방 호스');
            $('.fire_info_text_b').html('');
            $('.fire_info_text_c').html('');
            $('.assurance_info_text_a').html('')
            $('.security_title').html('철저한 24시간 보안');
            $('.safe_consultation_text_a').html('모든 항목에 무료 보험이 보장');
            $('.safe_consultation_text_b').html('');
            $('.open_info_text_a').html('파티션 없이 공간 활용이 자유로운 보관시설');
            $('.open_info_text_b').html('');
            $('.staffOnly_title').html('제한된 출입 관리');
            $('.staffOnly_info_text_a').html('직원 외 출입 제한');
            $('.staffOnly_info_text_b').html('');
            $('.safe_consultation').html('');
            
        }else if(window_width > 750){
            /* 공유창고 종류 - 이미지, 정보 순서 변경 */
            $('.share_box_category_self').html(`
                <li class="share_box_category_self--img"></li>
                <li class="share_box_category_self--info_wrap">
                    <p class="share_box_category_self_info_sub_title">방문형</p>
                    <p class="share_box_category_self_info_title">셀프스토리지</p>
                    <p class="share_box_category_self_info_pay">장기 보관 시 <br>최대 30% 할인</p>
                </li>
                <li class="share_box_category_self--detail">
                    <p class="share_box_category_self_detail_text">상세설명</p>
                </li>
            `)
            $('.share_box_category_product').html(`
                <li class="share_box_category_product--img"></li>
                <li class="share_box_category_product--info_wrap">
                    <p class="share_box_category_product_info_sub_title">배송형</p>
                    <p class="share_box_category_product_info_title">물품 단위</p>
                    <p class="share_box_category_product_info_pay">월 ₩7500부터 <br>(최소 1개월)</p>
                </li>
                <li class="share_box_category_product--detail">
                    <p class="share_box_category_product_detail_text">상세설명</p>
                </li>
            `)
            $('.share_box_category_area').html(`
                <li class="share_box_category_area--img"></li>
                <li class="share_box_category_area--info_wrap">
                    <p class="share_box_category_area_info_sub_title">배송형</p>
                    <p class="share_box_category_area_info_title">물품 단위</p>
                    <p class="share_box_category_area_info_pay">월 ₩69,000부터 <br>(최소 1개월)</p>
                </li>
                <li class="share_box_category_area--detail">
                    <p class="share_box_category_area_detail_text">상세설명</p>
                </li>
            `);
            /* 상세설명 스토리지 - 이미지, 정보 순서 변경 */
            $('.detail_explain_self_wrap').html(`
                <ul class="detail_explain_self_info">
                    <li class="detail_explain_self_info--title">셀프스토리지</li>
                    <li class="detail_explain_self_info--sub_title">24시간 간편하고 안전하게 나만의 공유창고</li>
                    <li class="detail_explain_self_info--customer_center">
                        <div class="detail_explain_self_info_customer_center_clock"></div>
                        <ul class="detail_explain_self_info_customer_center_info">
                            <li class="detail_explain_self_info_customer_center_info--title">고객센터</li>
                            <li class="detail_explain_self_info_customer_center_info--time">월요일 - 금요일 : 오전 10시 ~ 오후 7시</li>
                            <li class="detail_explain_self_info_customer_center_info--sub_time">(주말 및 공휴일 휴무)</li>
                        </ul>

                        </li>
                        <li class="detail_explain_self_info--apply">
                            <div class="detail_explain_self_info_apply">바로 신청하기</div>
                            
                            <div class="detail_explain_self_info_estn">1초 견적 받기</div>
                        </li>
                    </ul>
                <div class="detail_explain_self_img"></div>
            `);
            $('.detail_explain_self_wrap').css({
                'flex-direction':'column',
                'background-repeat':'no-repeat'
            });
            setInterval("slide_left", 1000);
            
            $('.safe_consultation').html(`
                <div class="consultation_simple">간편 상담하기</div>
                <div class="consultation_text_wrap">
                    <p class="consultation_text">
                        BOXFUL의&nbsp;
                        <p class="consultation_text_accent">보관 제한 품목</p> 
                        목록을 확인해주세요
                    </p>
                </div>
            `);
        }
})
/* 
    문서가 로드되고 화면사이즈에 따라 
    공유박스종류 - 콘텐츠 순서 변경
*/
$(document).ready( () => {
        const window_width = $(window).width();
        let slide_count = 0;
        if(window_width < 750){
            /* 공유창고 종류 - 이미지, 정보 순서 변경 */
            $('.share_box_category_self').html(`
                <li class="share_box_category_self--info_wrap">
                    <p class="share_box_category_self_info_sub_title">방문형</p>
                    <p class="share_box_category_self_info_title">셀프스토리지</p>
                    <p class="share_box_category_self_info_pay">장기 보관 시 <br>최대 30% 할인</p>
                </li>
                <li class="share_box_category_self--img"></li>
                <li class="share_box_category_self--detail">
                    <p class="share_box_category_self_detail_text">상세설명</p>
                </li>
            `)
            $('.share_box_category_product').html(`
                <li class="share_box_category_product--info_wrap">
                    <p class="share_box_category_product_info_sub_title">배송형</p>
                    <p class="share_box_category_product_info_title">물품 단위</p>
                    <p class="share_box_category_product_info_pay">월 ₩7500부터 <br>(최소 1개월)</p>
                </li>
                <li class="share_box_category_product--img"></li>
                <li class="share_box_category_product--detail">
                    <p class="share_box_category_product_detail_text">상세설명</p>
                </li>
            `)
            $('.share_box_category_area').html(`
                <li class="share_box_category_area--info_wrap">
                    <p class="share_box_category_area_info_sub_title">배송형</p>
                    <p class="share_box_category_area_info_title">물품 단위</p>
                    <p class="share_box_category_area_info_pay">월 ₩69,000부터 <br>(최소 1개월)</p>
                </li>
                <li class="share_box_category_area--img"></li>
                <li class="share_box_category_area--detail">
                    <p class="share_box_category_area_detail_text">상세설명</p>
                </li>
            `);
            /* 상세설명 스토리지 - 이미지, 정보 순서 변경 */
            $('.detail_explain_self_wrap').html(`
                <ul class="detail_explain_self_info">
                    <div class="detail_explain_self_img"></div>
                    <li class="detail_explain_self_info--title">셀프스토리지</li>
                    <li class="detail_explain_self_info--sub_title">24시간 간편하고 안전하게 나만의 공유창고</li>
                    <li class="detail_explain_self_info--customer_center">
                        <div class="detail_explain_self_info_customer_center_clock"></div>
                        <ul class="detail_explain_self_info_customer_center_info">
                            <li class="detail_explain_self_info_customer_center_info--title">고객센터</li>
                            <li class="detail_explain_self_info_customer_center_info--time">월요일 - 금요일 : 오전 10시 ~ 오후 7시</li>
                            <li class="detail_explain_self_info_customer_center_info--sub_time">(주말 및 공휴일 휴무)</li>
                        </ul>

                        </li>
                        <li class="detail_explain_self_info--apply">
                            <div class="detail_explain_self_info_apply">바로 신청하기</div>
                            
                            <div class="detail_explain_self_info_estn">1초 견적 받기</div>
                        </li>
                    </ul>
                
            `);
            $('.detail_explain_self_wrap').css({'flex-direction':'column','background-repeat':'no-repeat'});


            /* 바이러스 안심 공유창고 */
            $('.security_info_text_a').html('24시간 작동되는 CCTV, 직원 외 출입제한');
            $('.security_info_text_b').html('');
            $('.fire_info_text_a').html('자동 화재 스프링클러, 화재 경보기, 소방 호스');
            $('.fire_info_text_b').html('');
            $('.fire_info_text_c').html('');
            $('.assurance_info_text_a').html('')
            $('.security_title').html('철저한 24시간 보안');
            $('.safe_consultation_text_a').html('모든 항목에 무료 보험이 보장');
            $('.safe_consultation_text_b').html('');
            $('.open_info_text_a').html('파티션 없이 공간 활용이 자유로운 보관시설');
            $('.open_info_text_b').html('');
            $('.staffOnly_title').html('제한된 출입 관리');
            $('.staffOnly_info_text_a').html('직원 외 출입 제한');
            $('.staffOnly_info_text_b').html('');
            $('.safe_consultation').html('');

            /* 상세설명 슬라이드 Mobile */
            setInterval(()=>{
                slide_count++;
                console.log();
                switch(slide_count){
                    case 1:
                        $('.detail_explain_slide_move').css({'transition-duration':'1.2s'});
                        $('.detail_explain_slide_move').css({'margin-top':'-585px'});
                        break;
                    case 3:
                        $('.detail_explain_slide_move').css({'margin-top':'-1164px'});
                        break;
                    case 5:
                        $('.detail_explain_slide_move').css({'transition-duration':'0s', 'margin-top':'0px'});
                        break;
                    case 6:
                        slide_count = 0;
                        break;
                        
                }
            }, 1000);

        }else if(window_width > 750){
            $('.share_box_category_self').html(`
                <li class="share_box_category_self--img"></li>
                <li class="share_box_category_self--info_wrap">
                    <p class="share_box_category_self_info_sub_title">방문형</p>
                    <p class="share_box_category_self_info_title">셀프스토리지</p>
                    <p class="share_box_category_self_info_pay">장기 보관 시 <br>최대 30% 할인</p>
                </li>
                <li class="share_box_category_self--detail">
                    <p class="share_box_category_self_detail_text">상세설명</p>
                </li>
            `)
            $('.share_box_category_product').html(`
                <li class="share_box_category_product--img"></li>
                <li class="share_box_category_product--info_wrap">
                    <p class="share_box_category_product_info_sub_title">배송형</p>
                    <p class="share_box_category_product_info_title">물품 단위</p>
                    <p class="share_box_category_product_info_pay">월 ₩7500부터 <br>(최소 1개월)</p>
                </li>
                <li class="share_box_category_product--detail">
                    <p class="share_box_category_product_detail_text">상세설명</p>
                </li>
            `)
            $('.share_box_category_area').html(`
                <li class="share_box_category_area--img"></li>
                <li class="share_box_category_area--info_wrap">
                    <p class="share_box_category_area_info_sub_title">배송형</p>
                    <p class="share_box_category_area_info_title">물품 단위</p>
                    <p class="share_box_category_area_info_pay">월 ₩69,000부터 <br>(최소 1개월)</p>
                </li>
                <li class="share_box_category_area--detail">
                    <p class="share_box_category_area_detail_text">상세설명</p>
                </li>
            `);
            /* 상세설명 스토리지 - 이미지, 정보 순서 변경 */
            $('.detail_explain_self_wrap').html(`
                <ul class="detail_explain_self_info">
                    <li class="detail_explain_self_info--title">셀프스토리지</li>
                    <li class="detail_explain_self_info--sub_title">24시간 간편하고 안전하게 나만의 공유창고</li>
                    <li class="detail_explain_self_info--customer_center">
                        <div class="detail_explain_self_info_customer_center_clock"></div>
                        <ul class="detail_explain_self_info_customer_center_info">
                            <li class="detail_explain_self_info_customer_center_info--title">고객센터</li>
                            <li class="detail_explain_self_info_customer_center_info--time">월요일 - 금요일 : 오전 10시 ~ 오후 7시</li>
                            <li class="detail_explain_self_info_customer_center_info--sub_time">(주말 및 공휴일 휴무)</li>
                        </ul>

                        </li>
                        <li class="detail_explain_self_info--apply">
                            <div class="detail_explain_self_info_apply">바로 신청하기</div>
                            
                            <div class="detail_explain_self_info_estn">1초 견적 받기</div>
                        </li>
                    </ul>
                <div class="detail_explain_self_img"></div>
            `);
            $('.detail_explain_self_wrap').css({
                'flex-direction':'column',
                'background-repeat':'no-repeat'
            });

            /* 바이러스 안심 공유창고 */
            $('.safe_consultation').html(`
                <div class="consultation_simple">간편 상담하기</div>
                <div class="consultation_text_wrap">
                    <p class="consultation_text">
                        BOXFUL의&nbsp;
                        <p class="consultation_text_accent">보관 제한 품목</p> 
                        목록을 확인해주세요
                    </p>
                </div>
            `);

            /* 상세설명 슬라이드 PC */
            setInterval(()=>{
                slide_count++;
                console.log(slide_count);
                switch(slide_count){
                    case 1:
                        $('.detail_explain_slide_move').css({'transition-duration':'1.2s'});
                        $('.detail_explain_slide_move').css({'margin-left':'-960px'});
                        break;
                    case 3:
                        $('.detail_explain_slide_move').css({'margin-left':'-1930px'});
                        break;
                    case 5:
                        $('.detail_explain_slide_move').css({'transition-duration':'0s', 'margin-left':'-22px'});
                        break;
                    case 6:
                        slide_count = 0;
                        break;
                }
            },1000);
        }
});

/* 사이드 메뉴바 */
this.addEventListener('click', (e)=>{
    switch( e.target.id ){
        case 'header_mobile_nav':
            $('.header_mobile_side_nav_wrap').css({'right':'0'});
            break;
        case 'side_menu_close_btn':
            $('.header_mobile_side_nav_wrap').css({'right':'-700px'});
            break;
        case 'header_mobile_login':
            window.open('../login/login.php');
            break;
        case 'header_aside_login':
            window.open('../login/login.php');
            break;
        case 'header_mobile_side_nav_login':
            window.open('../login/login.php');
            break;
    }
})

