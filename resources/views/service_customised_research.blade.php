@extends('layout.header')
@yield('title')
@section('content')
 <link rel="stylesheet" media="all" href="{{asset('css/customised_research.css')}}">

<script src="https://challenges.cloudflare.com/turnstile/v0/api.js" async defer></script>

<style>
   .intl-tel-input .flag-dropdown{
      margin-top: 5px!important;
   }
   .iti--separate-dial-code{
      width:100%;
      margin-left: -5px;
      margin-bottom: 15px;
   }
   .iti__country-list{
      width:200px!important;
   }
   .intl-tel-input input{
      height:40px;
   }
</style>




<main>
<div id="about-us" class="ab-body ab-page-about rcube-body">
      
  <section class="rcube-custom-research-hero rcube-bg-black rcube-color-white rcube-section">
   <div class="rcube-wrapper">
      <div class="rcube-custom-research-hero-area">
         <h1 class="rcube-large-title">Obtain a personalized research report crafted by seasoned professionals</h1>
         <p class="rcube-p rcube-large-text">Are you looking for customized market research designed to meet your specific requirements?</p>
         <div class="rcube-custom-research-hero-action"><a href="#queryform" class="button button-res checkout-btn">Submit Your Request</a></div>
      </div>
   </div>
  </section>
  <section class="rcube-custom-research-how-it-works rcube-bg-subtle-gray rcube-section">
    <div class="rcube-wrapper">
      <div class="rcube-custom-research-how-it-works-chart rcube-row rcube-row-gap-large rcube-row-v-padding">
         <div class="rcube-custom-research-how-it-works-chart-bg">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1180 160">
               <title>custom-research--how-it-works--bg</title>
               <path d="M132,80s71.75-60,148-60S437,80,437,80s76.75,60,153,60S742,80,742,80s71.75-60,148-60,157,60,157,60" fill="none" stroke="#f1b942" stroke-width="5" stroke-dasharray="10"></path>
               <path d="M278,31V9.66a1.65,1.65,0,0,1,2.83-1.17l10.68,10.68a1.66,1.66,0,0,1,0,2.35h0L280.83,32.2a1.65,1.65,0,0,1-2.34,0A1.62,1.62,0,0,1,278,31Z" fill="#f1b942"></path>
               <path d="M583,151V129.66a1.65,1.65,0,0,1,2.83-1.17l10.68,10.68a1.66,1.66,0,0,1,0,2.35h0L585.83,152.2a1.65,1.65,0,0,1-2.34,0A1.62,1.62,0,0,1,583,151Z" fill="#f1b942"></path>
               <path d="M888,31V9.66a1.65,1.65,0,0,1,2.83-1.17l10.68,10.68a1.66,1.66,0,0,1,0,2.35h0L890.83,32.2a1.65,1.65,0,0,1-2.34,0A1.62,1.62,0,0,1,888,31Z" fill="#f1b942"></path>
               <rect width="1180" height="160" fill="none"></rect>
            </svg>
         </div>
         <div class="rcube-col rcube-col-desktop-3 rcube-col-phone-6 rcube-col-phonemin-12">
            <div class="rcube-custom-research-how-it-works-chart-item">
               <div class="rcube-icon-circle rcube-icon-huge">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                     <title>icon-custom-research-howit-works--define</title>
                     <path d="M211.67,316.2a71.4,71.4,0,0,0,22.12-51.68V225.41a48.19,48.19,0,0,0,9.86-29.25v-40.9a10,10,0,0,0-10-10H151.24a60.72,60.72,0,0,0-60.65,60.66v58.6A71.39,71.39,0,0,0,112.7,316.2,104.36,104.36,0,0,0,12.21,420.36V502a10,10,0,0,0,10,10h280a10,10,0,0,0,10-10V420.36A104.35,104.35,0,0,0,211.67,316.2ZM151.24,165.26h72.41v30.9a28.44,28.44,0,0,1-28.41,28.41H110.59V205.92h0A40.7,40.7,0,0,1,151.24,165.26Zm-40.65,99.26V244.57h84.65a48.16,48.16,0,0,0,18.55-3.7v23.65a51.6,51.6,0,0,1-103.2,0Zm92.16,71.6-39.1,66.27-39.09-66.27ZM292.16,492H269.65V422.06a10,10,0,0,0-20,0V492h-172V422.06a10,10,0,0,0-20,0V492H32.21V420.36a84.35,84.35,0,0,1,69.87-83l53,89.77a10,10,0,0,0,17.23,0L225,337.86a84.37,84.37,0,0,1,67.21,82.5V492Z"></path>
                     <path d="M449.79,0H393.24a10,10,0,0,0,0,20h56.55a30,30,0,0,1,30,30V184a30,30,0,0,1-30,30H413.33a10,10,0,0,0-7.07,2.93L359,264.12V224a10,10,0,0,0-10-10H263.79a10,10,0,0,0,0,20H339v54.28a10,10,0,0,0,17.07,7.07L417.47,234h32.32a50.06,50.06,0,0,0,50-50V50A50.06,50.06,0,0,0,449.79,0Z"></path>
                     <path d="M363.86,2.93A10,10,0,0,0,346.79,10a10,10,0,1,0,17.07-7.07Z"></path>
                     <path d="M320.24,0H263.79a50.06,50.06,0,0,0-50,50v55.48a10,10,0,0,0,20,0V50a30,30,0,0,1,30-30h56.45a10,10,0,0,0,0-20Z"></path>
                     <path d="M226.15,427.09h-14a10,10,0,0,0,0,20h14a10,10,0,1,0,0-20Z"></path>
                     <path d="M145.59,261.57a10,10,0,1,0,2.93,7.07A10.06,10.06,0,0,0,145.59,261.57Z"></path>
                     <path d="M192.93,261.57a10,10,0,1,0,2.93,7.07A10.08,10.08,0,0,0,192.93,261.57Z"></path>
                     <path d="M393.71,89.49a37.11,37.11,0,0,0-34.32-34.32A36.73,36.73,0,0,0,331.53,65,37.15,37.15,0,0,0,319.77,92.1a10,10,0,1,0,20,0,17,17,0,0,1,18.24-17,17,17,0,0,1,2.52,33.57,17.44,17.44,0,0,0-13.74,17.1v20.07a10,10,0,0,0,20,0V127.74A36.82,36.82,0,0,0,393.71,89.49Z"></path>
                     <path d="M363.86,171.84a10,10,0,1,0,2.93,7.08A10.07,10.07,0,0,0,363.86,171.84Z"></path>
                  </svg>
               </div>
               <div class="rcube-tiny-title rcube-color-primary">Define</div>
               <div><strong>Define a clear and specific scope, focusing on the precise topics or questions that you want to explore by filling the form below.</strong></div>
            </div>
         </div>
         <div class="rcube-col rcube-col-desktop-3 rcube-col-phone-6 rcube-col-phonemin-12">
            <div class="rcube-custom-research-how-it-works-chart-item">
               <div class="rcube-icon-circle rcube-icon-huge">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                     <title>icon-custom-research-howit-works--deal</title>
                     <path d="M247.72,133c-3.9,0-8.69-.57-12-4.22-1.14-1.29-2.14-2.49-3.11-3.49-7.81-8.22-21.27,3.2-13.12,13.88l2,2.54a29.5,29.5,0,0,0,6.9,5.57,33.33,33.33,0,0,0,10.81,4.42v14.1a8.86,8.86,0,0,0,8.81,8.85,9,9,0,0,0,9-8.85V151.63a32.24,32.24,0,0,0,16.34-9.31q6.75-7.06,6.75-18.76c0-5.31-1-9.73-3.08-13.3a17.45,17.45,0,0,0-7.55-7.42,70.45,70.45,0,0,0-9.93-3.69,74.67,74.67,0,0,0-9.89-2.25,18.53,18.53,0,0,1-7.56-2.69A6.18,6.18,0,0,1,239,88.87c0-10.5,15.39-9.22,22.18-3.51,10,8.43,21.21-7,9.61-15.7l-1.34-1.2a29.6,29.6,0,0,0-4.82-2.71A33.6,33.6,0,0,0,257,63.21V51a8.84,8.84,0,1,0-17.68,0V63.07A25.83,25.83,0,0,0,218,88.56c0,6,1.4,11,4.19,14.88a22.94,22.94,0,0,0,10.21,8.25,85.09,85.09,0,0,0,12,3.82,61.34,61.34,0,0,1,10.21,3.26c2.8,1.19,4.19,2.88,4.19,5.08Q258.81,133,247.72,133Z"></path>
                     <path d="M501.43,288.85,419.26,183.6a29.25,29.25,0,0,0-40.62-5.28l-53.77,41a28.65,28.65,0,0,0-11.3,22.59c-20.5-1.55-41.68,0-62.24,13.37l-.92.6-52-8a28.75,28.75,0,0,0-11.25-24.58l-53.79-41a29.22,29.22,0,0,0-40.62,5.24L73.14,212.71A10.08,10.08,0,0,0,89,225.12L108.62,200a9.1,9.1,0,0,1,12.5-1.61l53.8,41a8.53,8.53,0,0,1,1.56,12L94.29,356.66a9.1,9.1,0,0,1-12.47,1.63L28,317.29a8.49,8.49,0,0,1-1.56-12l14-17.9A10.08,10.08,0,1,0,24.55,275l-14,17.88a28.67,28.67,0,0,0,5.22,40.47l53.8,41a28.91,28.91,0,0,0,17.57,5.89,29.49,29.49,0,0,0,10.42-1.91l7,9.54a27.45,27.45,0,0,0-1.33,23.19c4.35,11.45,14.61,19.2,25.7,19.57a29.89,29.89,0,0,0,1.47,4.88c4.48,11.08,14.69,18.62,25.67,19.12.05.29.08.58.14.86a30,30,0,0,0,19.84,22.08,27.15,27.15,0,0,0,7.62,1.34,26.2,26.2,0,0,0,6.12,11.49,26.61,26.61,0,0,0,19.73,8.86A29.48,29.48,0,0,0,227,493.19l11.42,10.67A29.86,29.86,0,0,0,258.78,512a28.39,28.39,0,0,0,20.2-8.36,34.2,34.2,0,0,0,7.55-11.42,28.37,28.37,0,0,0,8.25,1.27,26.11,26.11,0,0,0,18.81-8,31.13,31.13,0,0,0,7.87-14.95c.41,0,.81,0,1.23.05h.3a29.7,29.7,0,0,0,21-8.48,28.71,28.71,0,0,0,7.62-13.51,30.53,30.53,0,0,0,5.78.57,28.61,28.61,0,0,0,7.23-.92,27,27,0,0,0,19.6-19.83c2.18-9-.07-18.46-6.18-27.07,15.84-12.74,22.24-19,29.48-30.75a29.11,29.11,0,0,0,17.31,5.63h0a28.72,28.72,0,0,0,17.59-5.92l53.81-41a28.68,28.68,0,0,0,5.23-40.46ZM134.21,408.39a6.91,6.91,0,0,1-4.46,2.1c-2.89,0-6.26-2.9-7.67-6.6-1.27-3.36-.68-6.17,1.78-8.35l0,0,0,0,34-30.2c2.84-2.52,5.7-3.86,8.27-3.86a8.49,8.49,0,0,1,7.59,5.52,6.32,6.32,0,0,1-1.94,7.51l-5.92,5.35h0l-.09.08-.65.58Zm27.46,24.1a6.79,6.79,0,0,1-4.46,2c-3.06,0-6.62-2.88-8.1-6.55-1.64-4.05.3-5.92.92-6.51.39-.38.86-.83,1.36-1.36h0l.1-.09c1.94-1.74,19-17.17,27.18-24.55l.61-.54c2.77-2.43,5.57-3.71,8.11-3.71,4,0,7,3.06,8.06,5.91a6.16,6.16,0,0,1-1.9,7.35l-2.09,1.84-.05,0v0Zm30.06,21.77-.41.38L189,456.77c-2.11,1.9-4.21,2.42-6.63,1.63a10,10,0,0,1-6.36-7c-.54-2.64.51-5.09,3.2-7.46l3.37-2.94c.08-.07.15-.16.24-.23l22-19.39c5.28-4.67,10.51-5.13,14-1.24.49.55,4.64,5.48-.42,10.06l-13.54,12.22-.44.37-.14.15-12.39,11.18Zm13.05,22.64c-1.06-1.18-3.11-4.24.25-7.47l13.51-12.18a14.9,14.9,0,0,1,2.93-2l.12-.07c5.45-2.91,8.4.48,9.17,1.59a4.86,4.86,0,0,1-.84,7L220.67,472l-.11.1-4,3.6C210,481.63,205.88,478.12,204.78,476.9Zm159.81-53.26a6.72,6.72,0,0,1-5,5.05c-4.25,1.08-9.62-1.27-14.53-6.32-.37-.4-.75-.81-1.14-1.2l-38.07-37.62a10.08,10.08,0,0,0-14.18,14.34l38,37.57.19.2a8.48,8.48,0,0,1,2.37,5.9,8.76,8.76,0,0,1-2.55,6.27,9.46,9.46,0,0,1-6.7,2.56h-.11a8.92,8.92,0,0,1-6-2.17,26.69,26.69,0,0,0-2.07-2.36L287,418a10.09,10.09,0,0,0-14.27,14.26l26.39,26.42a9.67,9.67,0,0,0,1.08,1.33l1.12,1.16c1.45,2.76.55,7.4-2.22,10.25-4.27,4.4-10.29.52-14.57-3.5l-11.92-11.22a10.09,10.09,0,0,0-13.83,14.69l9.11,8.56.06.07c.21.19.52.49.54,1.5,0,2.37-1.53,5.61-3.8,7.88-3.32,3.32-8.83,3.2-12.55-.27l-10-9.32,1.22-1.1c9.89-8.89,11.49-22.68,3.88-33.54a26.79,26.79,0,0,0-9.06-8.19c4.91-9.67,3.54-21.41-4.38-30.26A27.92,27.92,0,0,0,216,397.56a27.67,27.67,0,0,0-1.7-7.6,29.4,29.4,0,0,0-20-18.06,26.89,26.89,0,0,0-1.73-12.2,28.64,28.64,0,0,0-26.42-18.43c-7.58,0-15.07,3.09-21.66,8.94l-25.75,22.88-5.66-7.75L189.86,267l35.1,5.37-5.31,3.44c-28.44,18.45-30.52,39.91-23,53.84,6,11.15,18.06,17.53,30.84,17.53a38.94,38.94,0,0,0,15.79-3.36l.41-.19,26.58-13.18,15.35,14,.05,0,0,0,70.94,63.1C362.75,413,365.71,419,364.59,423.64Zm-.85-36.73-64.56-57.42-20.4-18.57a10.07,10.07,0,0,0-11.27-1.58L235,325.48c-8.84,3.8-17.54.18-20.56-5.4-4.15-7.67,2.07-18.15,16.23-27.33l31.68-20.56c17.18-11.17,35.21-12,59.86-9.17l71.38,91.47C386,368,382,372.31,363.74,386.91Zm123.52-79.32a8.49,8.49,0,0,1-3.28,5.68l-53.83,41A8.72,8.72,0,0,1,424.8,356h0a8.92,8.92,0,0,1-7.11-3.41L335.53,247.36a8.51,8.51,0,0,1,1.57-12l53.75-41a9.06,9.06,0,0,1,12.5,1.63l82.17,105.25A8.51,8.51,0,0,1,487.26,307.59Z"></path>
                     <path d="M196.83,204.86a109.18,109.18,0,0,0,51.72,13.06c60,0,108.85-48.88,108.85-109A109.45,109.45,0,0,0,295,10.42,107.81,107.81,0,0,0,248.55,0c-60,0-108.83,48.87-108.83,109A109,109,0,0,0,196.83,204.86ZM248.55,20.17a87.73,87.73,0,0,1,37.86,8.48,88.68,88.68,0,1,1-37.86-8.48Z"></path>
                     <path d="M50.51,257.91a10.06,10.06,0,0,0,14.17-1.59l.11-.14A10.08,10.08,0,1,0,49,243.6l-.11.14A10.07,10.07,0,0,0,50.51,257.91Z"></path>
                  </svg>
               </div>
               <div class="rcube-tiny-title rcube-color-primary">Approach Formulation</div>
               <div><strong>We would offer you with a cost effective approach with specific research methodology to be approved.</strong></div>
            </div>
         </div>
         <div class="rcube-col rcube-col-desktop-3 rcube-col-phone-6 rcube-col-phonemin-12">
            <div class="rcube-custom-research-how-it-works-chart-item">
               <div class="rcube-icon-circle rcube-icon-huge">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                     <title>icon-custom-research-howit-works--checklist</title>
                     <path d="M400,152H256a10,10,0,0,0,0,20H400a10,10,0,0,0,0-20Z"></path>
                     <path d="M365,202.93a10,10,0,1,0,2.93,7.07A10.08,10.08,0,0,0,365,202.93Z"></path>
                     <path d="M263.06,45.93A10,10,0,1,0,266,53,10.08,10.08,0,0,0,263.06,45.93Z"></path>
                     <path d="M315.88,200H256a10,10,0,0,0,0,20h59.88a10,10,0,0,0,0-20Z"></path>
                     <path d="M400,260H256a10,10,0,0,0,0,20H400a10,10,0,0,0,0-20Z"></path>
                     <path d="M365,310.93a10,10,0,1,0,2.93,7.07A10.08,10.08,0,0,0,365,310.93Z"></path>
                     <path d="M315.88,308H256a10,10,0,0,0,0,20h59.88a10,10,0,0,0,0-20Z"></path>
                     <path d="M400,368H256a10,10,0,0,0,0,20H400a10,10,0,0,0,0-20Z"></path>
                     <path d="M365,418.93a10,10,0,1,0,2.93,7.07A10.08,10.08,0,0,0,365,418.93Z"></path>
                     <path d="M315.88,416H256a10,10,0,0,0,0,20h59.88a10,10,0,0,0,0-20Z"></path>
                     <path d="M419.24,39H342.86a61.26,61.26,0,0,0-42.38-17h-8.76a40,40,0,0,0-71.44,0H211.5a61.26,61.26,0,0,0-42.38,17H92.76A48.81,48.81,0,0,0,44,87.76V463.24A48.81,48.81,0,0,0,92.76,512H419.24A48.81,48.81,0,0,0,468,463.24V87.76A48.81,48.81,0,0,0,419.24,39ZM211.5,42h15.59a10,10,0,0,0,9.64-7.34,20,20,0,0,1,38.54,0A10,10,0,0,0,284.91,42h15.57a41.56,41.56,0,0,1,41.35,38H170.15A41.56,41.56,0,0,1,211.5,42ZM448,463.24A28.79,28.79,0,0,1,419.24,492H92.76A28.79,28.79,0,0,1,64,463.24V87.76A28.79,28.79,0,0,1,92.76,59h62.35A61.08,61.08,0,0,0,150,83.5V90a10,10,0,0,0,10,10H352a10,10,0,0,0,10-10V83.5a61.25,61.25,0,0,0-5.1-24.5h62.36A28.79,28.79,0,0,1,448,87.76Z"></path>
                     <path d="M192.41,149.6a10,10,0,0,0-14.14,0l-42.76,42.77-13.18-13.18a10,10,0,1,0-14.14,14.15l20.25,20.24a10,10,0,0,0,14.14,0l49.83-49.83A10,10,0,0,0,192.41,149.6Z"></path>
                     <path d="M168,368H120a10,10,0,0,0-10,10v48a10,10,0,0,0,10,10h48a10,10,0,0,0,10-10V378A10,10,0,0,0,168,368Zm-10,48H130V388h28Z"></path>
                     <path d="M168,260H120a10,10,0,0,0-10,10v48a10,10,0,0,0,10,10h48a10,10,0,0,0,10-10V270A10,10,0,0,0,168,260Zm-10,48H130V280h28Z"></path>
                  </svg>
               </div>
               <div class="rcube-tiny-title rcube-color-primary">Finalize the Approach</div>
               <div><strong>Closing the research objective with the most suitable technique and research methodology, while also finalizing the timeline and budget.</strong></div>
            </div>
         </div>
         <div class="rcube-col rcube-col-desktop-3 rcube-col-phone-6 rcube-col-phonemin-12">
            <div class="rcube-custom-research-how-it-works-chart-item">
               <div class="rcube-icon-circle rcube-icon-huge">
                  <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                     <title>icon-custom-research-howit-works--analytics</title>
                     <path d="M502,208.75H438a10,10,0,0,0-10,10v50.5a10,10,0,0,0,20,0v-40.5h44V492H448V344.25a10,10,0,0,0-20,0V492H408V285a10,10,0,0,0-10-10H334a10,10,0,0,0-10,10V492H304V355a10,10,0,0,0-10-10H230a10,10,0,0,0-10,10V492H200V412.37a10,10,0,0,0-10-10H126a10,10,0,0,0-10,10V492H30a10,10,0,0,1-10-10V30A10,10,0,0,1,30,20H288V86a30,30,0,0,0,30,30h66V239a10,10,0,0,0,20,0V106a10,10,0,0,0-2.93-7.07l-96-96A10,10,0,0,0,298,0H30A30,30,0,0,0,0,30V482a30,30,0,0,0,30,30H502a10,10,0,0,0,10-10V218.75A10,10,0,0,0,502,208.75ZM308,34.14,369.83,96H318a10,10,0,0,1-10-10ZM180,492H136V422.37h44Zm104,0H240V365h44Zm104,0H344V295h44Z"></path>
                     <path d="M445.07,297.82a10,10,0,1,0,2.93,7.07A10,10,0,0,0,445.07,297.82Z"></path>
                     <path d="M145.58,54.73a10,10,0,0,0-10,10v18A92,92,0,1,0,237,184.15h18a10,10,0,0,0,10-10A119.55,119.55,0,0,0,145.58,54.73Zm0,191.4a72,72,0,0,1-10-143.26v71.28a10,10,0,0,0,10,10h71.28A72.09,72.09,0,0,1,145.58,246.13Zm10-82h0V75.23a99.61,99.61,0,0,1,88.92,88.92Z"></path>
                     <path d="M255,294.25H64a10,10,0,0,0,0,20H255a10,10,0,0,0,0-20Z"></path>
                     <path d="M128,342.5H64a10,10,0,0,0,0,20h64a10,10,0,0,0,0-20Z"></path>
                     <path d="M185.15,345.43a10,10,0,1,0,2.93,7.07A10.08,10.08,0,0,0,185.15,345.43Z"></path>
                  </svg>
               </div>
               <div class="rcube-tiny-title rcube-color-primary">Analyze and Report</div>
               <div><strong>We place a strong emphasis on the data's importance and how it substantiates your recommendations, with a dedicated focus on aligning with and exceeding your expectations.</strong></div>
            </div>
         </div>
      </div>
   </div>
  </section>
  
   <section class="ab-about-hero ab-bg-subtle-white ab-section">
    <div class="ab-wrapper">
        <div class="ab-row ab-row-gap-huge">
          <div class="ab-col ab-col-desktop-12 ab-col-tablet-12" style="text-align: left;">
            <h2 class="ab-color-primary">What is Custom Research?</h2>
            
            <div class="ab-about-hero-description" style="margin-top:30px;text-align:justify">
                <p class="ab-p" >A customized research approach is one that is specifically developed to match the demands and goals of an organization or client. It addresses particular queries, difficulties, or chances that a client may have and goes beyond generic or off-the-shelf research studies.
                </p>                    
            </div>
          </div> 
          
          <div class="ab-col ab-col-desktop-12 ab-col-tablet-12" style="text-align: left;">
            <h2 class=" ab-color-primary">Why do we need it?</h2>
            
            <div class="ab-about-hero-description" style="margin-top:30px;text-align:justify">
                <p class="ab-p" >Every business has unique questions, challenges, and objectives. Custom research allows companies to tailor the research process to address specific concerns and obtain insights that are directly relevant to their needs. It empowers organizations to gain a deeper understanding of their market, make informed decisions, and remain competitive in an ever-evolving business landscape.
                </p>                    
            </div>
          </div>
        </div>
    </div>
   </section>

   <section class="custom-container ab-about-hero text-justify">    
      <div class="ab-row ab-row-gap-huge">
          <h1 class=" text-center ab-col-desktop-12 ab-color-primary mb-4">Why Us?</h1>

          <div class=" ab-col ab-col-desktop-6 ab-col-tablet-12 text-center" >
            <img loading="lazy" src="{{asset('assets/images/icons/Handshake.png')}}" class="why_icon" alt="Handshake">
            
            <div class="ab-about-hero-description mt-3 text-justify" >
               <h4 class="mb-2">Expertise</h4>
                <p class="ab-p" >Our team of seasoned researchers, analysts, and data scientists brings a wealth of experience to the table. We've worked across diverse industries and have a deep understanding of market dynamics and trends.
                </p>                    
            </div>
          </div>
          
          <div class=" ab-col ab-col-desktop-6 ab-col-tablet-12 text-center" >
            <img loading="lazy" src="{{asset('assets/images/icons/Handshake.png')}}" class="why_icon"  alt="Handshake">
            
            <div class="ab-about-hero-description mt-3">
               <h4 class="mb-2">Cutting-Edge Technology</h4>
                <p class="ab-p" >We leverage the latest technology and methodologies to gather, process, and interpret data. This ensures the most accurate and up-to-date insights for your business.
                </p>                    
            </div>
          </div>

          <div class=" ab-col ab-col-desktop-6 ab-col-tablet-12 text-center" >
            <img  loading="lazy" src="{{asset('assets/images/icons/icon-document.png')}}" class="why_icon"  alt="icon-document">
            
            <div class="ab-about-hero-description text-justify" >
               <h4 class="mb-2">Dedication to Excellence</h4> 
               <p class="ab-p" >Quality is non-negotiable for us. Our commitment to excellence is reflected in every research project we undertake. We meticulously validate our findings, providing you with trustworthy and valuable information.
                </p>                    
            </div>
          </div>

          <div class=" ab-col ab-col-desktop-6 ab-col-tablet-12 text-center" > 
            <img loading="lazy" src="{{asset('assets/images/icons/icon-document.png')}}" class="why_icon" alt="icon-document">
            
            <div class="ab-about-hero-description text-justify">
               <h4 class="mb-2">Client-Centric Approach</h4> 
               <p class="ab-p" >We consider our clients as partners. Your success is our success, and we maintain open lines of communication to ensure that your goals and expectations are met.
                </p>                    
            </div>
          </div>          
          
        </div>
      
   </section>

   <section class="ab-about-hero ab-bg-subtle-gray ab-section">
      <div class="ab-wrapper">
         <div class="ab-row ab-row-gap-huge">
            
               <div class=" ab-col ab-col-desktop-6 ab-col-tablet-12 text-left" >
                  
                     <h3 class="mb-2 ab-color-primary">Our Offerings</h3>
                     <ul class="offerring-ul" style="list-style:circle">
                        <li>  Market Research Reports</li>
                        <li>  Customized Research</li>
                        <li>  Competitive Analysis</li>
                        <li>  Consumer Behavior Studies</li>
                        <li>  Surveys and Questionnaires</li>
                        <li>  Focus Groups</li>
                        <li>  Data Collection and Analysis</li>
                        <li>  Trend Analysis</li>
                        <li>  Brand and Reputation Assessment</li>
                        <li>  Market Entry and Expansion Studies</li>
                        <li>  Product Testing and Evaluation</li>
                        <li> Ad Testing</li>
                        <li> Feasibility Studies</li>
                        <li> Public Opinion Research</li>
                        <li> Industry and Market Assessments</li>
                        <li> Data Visualization and Reporting</li>
                        <li> Consulting and Strategy Development</li>
                        <li> Value Chain Analysis</li>
                        <li> Portfolio and Acquisition Assessment</li>
                        <li> Biographies</li>
                     </ul>
                  
               </div>
               <div class=" ab-col ab-col-desktop-6 ab-col-tablet-12 text-left" style="box-shadow: grey 0px 0px 10px; ">
                  <div from="custom-research" class="" style="padding:20px 10px;">
                     <h3 class="mb-2 ab-color-primary">Enquiry Form</h3>
                     <div class="contact-form-wrap">
                              <a name="formsub">&nbsp;</a>
                           <form class="contact-form" action="{{url('Submitenquery#formsub')}}" method="post" id="queryform">
                        @csrf
                       <div class="custom-form-grp">
                            <input type="text" name="name" class="form-group" placeholder="Name" id="contact_name" required value="{{old('name')}}">
                        </div>
                        
                        <div class="custom-form-grp">
                            <input type="email" name="contact_email" class="form-group" placeholder="Business Email" id="contact_email" required value="{{old('contact_email')}}" >
                        </div>
                        
                        <div class="custom-form-grp">
                            <input type="text" name="contact_phone" class="form-group mobivali" placeholder="Phone" id="contact_phone" required value="{{old('contact_phone')}}">
                        </div>                          
                        
                        <div class="custom-form-grp">
                            <input type="text" name="budget" class="form-group" placeholder="Budget" id="budget" value="{{old('budget')}}">
                        </div>
                        
                        <div class="custom-form-grp">
                            <textarea name="contact_message" rows="4" class="form-group" placeholder="Please tell us your business objectives and our experts will find solutions that work." id="contact_message" required>{{old('contact_message')}}</textarea>
                        </div>
                       
                         <div class="custom-form-grp">
                              
                              <!--<div class="g-recaptcha" data-sitekey="{{ config('services.recaptcha.key') }}">
                           </div>
                           <div class="col-12 mt-2">
                             
                           @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                                </div>-->
                                 <div class="cf-turnstile"
     data-sitekey="{{ config('services.cloudflare.turnstile.site_key') }}"
     data-callback="onTurnstileSuccess"
></div>
                             </div>

                        <button class="ab-button ab-button-primary ab-button-small " type="submit">Submit </button>
                        
                    </form>
                     </div>
                  </div>
                  <script type="text/javascript">
                     // let contact_message = document.querySelector("#contact_message");
                     // if(window.location.href.includes("contact")){
                     //   contact_message.setAttribute("placeholder", "How can our research experts help you today?")
                     // }
                  </script>
               </div>
            
         </div>
      </div>
   </section>
</div>
</main>


@endsection