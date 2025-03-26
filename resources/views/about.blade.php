@extends('layout.header')
@yield('title')
@section('content')
  <link rel="stylesheet" media="all" href="{{asset('css/main.css')}}">
  <link rel="stylesheet" media="all" href="{{asset('css/custom.css')}}">


<main>
   <div id="about-us" class="ab-body ab-page-about">
      <section class="ab-about-hero ab-bg-subtle-gray ab-section">
            <div class="ab-wrapper">
               <div class="ab-row ab-row-gap-huge">
                  <div class="ab-col ab-col-desktop-6 ab-col-tablet-12" style="text-align: left;">
                        <h1 class="ab-large-title ab-color-primary">Market Research Solutions for Business Growth</h1>
                        
                        <div class="ab-about-hero-description" style="margin-top:30px;text-align:justify">
                           <p class="ab-p" >At Report Cube, we are more than just a market research company; we are your strategic partner in unlocking the insights that drive your business forward. With a passion for data, a commitment to precision, and a dedication to delivering actionable results, we have been a trusted resource for businesses seeking a competitive edge.
                           </p>
                           <p class="ab-p">Our mission is to empower businesses with the knowledge they need to make informed decisions, innovate, and thrive in an ever-evolving marketplace. We believe that data-driven insights are the cornerstone of success, and our team is dedicated to providing you with the highest quality research and analysis to help you stay ahead of the curve.</p>
                           <p class="ab-p">Our Commitment is to your success. We understand the challenges and opportunities that businesses face in today's dynamic environment, and we're here to help you navigate them with confidence. Our work is not just about collecting data; it's about providing you with the knowledge and insights that empower you to make smarter decisions and achieve your business goals.</p>
                        </div>
                  </div>
                  <div class="ab-col ab-col-desktop-6 ab-col-tablet-12 mt-5 pt-5">
                        <div class="ab-about-hero-images">
                           <div class="ab-about-hero-images-item-1 ab-about-hero-images-item"><img loading="lazy"
                                    src="{{asset('images/about-3.jpg')}}" alt="about"
                                    width="450" height="300"></div>
                           
                        </div>
                  </div>
               </div>
            </div>
      </section>
      <section class="ab-about-numbers ab-section ab-bg-yellow">
            <div class="ab-wrapper ab-align-center">
               <div class="ab-row ab-row-gap-huge ab-row-v-padding">
                  <div class="ab-col ab-col-desktop-3 ab-col-phone-6 ab-col-phonemin-12">
                        <div class="ab-counter">
                           <div class="ab-counter-number">900K+</div>
                           <div class="ab-counter-caption">Market Research Reports</div>
                        </div>
                  </div>
                  <div class="ab-col ab-col-desktop-3 ab-col-phone-6 ab-col-phonemin-12">
                        <div class="ab-counter">
                           <div class="ab-counter-number">800+</div>
                           <div class="ab-counter-caption">Industries Analyzed</div>
                        </div>
                  </div>
                  <div class="ab-col ab-col-desktop-3 ab-col-phone-6 ab-col-phonemin-12">
                        <div class="ab-counter">
                           <div class="ab-counter-number">1,700+</div>
                           <div class="ab-counter-caption">Research Teams</div>
                        </div>
                  </div>
                  <div class="ab-col ab-col-desktop-3 ab-col-phone-6 ab-col-phonemin-12">
                        <div class="ab-counter">
                           <div class="ab-counter-number">450+</div>
                           <div class="ab-counter-caption">Fortune 500 Clients</div>
                        </div>
                  </div>
               </div>
            </div>
      </section>
      <section class="ab-about-numbers ab-section ">
         <div class="ab-wrapper">
               <h2 class="ab-large-title ab-color-primary mb-1 mt-1" style="margin-left:20px;">Our Services</h2>
               <div class="ab-about-services-area ab-row ab-row-gap-huge ab-row-v-padding">
                  
                  <div class="ab-col ab-col-desktop-4 ab-col-tablet-12 services"  >
                     <a href="{{url('/syndicated-research')}}">
                        <div class="service-items">
                           <div class="ram-about-services-item-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><title>icon--services--market-research</title><path d="M502,208.75H438a10,10,0,0,0-10,10v50.5a10,10,0,0,0,20,0v-40.5h44V492H448V344.25a10,10,0,0,0-20,0V492H408V285a10,10,0,0,0-10-10H334a10,10,0,0,0-10,10V492H304V355a10,10,0,0,0-10-10H230a10,10,0,0,0-10,10V492H200V412.37a10,10,0,0,0-10-10H126a10,10,0,0,0-10,10V492H30a10,10,0,0,1-10-10V30A10,10,0,0,1,30,20H288V86a30,30,0,0,0,30,30h66V239a10,10,0,0,0,20,0V106a10,10,0,0,0-2.93-7.07l-96-96A10,10,0,0,0,298,0H30A30,30,0,0,0,0,30V482a30,30,0,0,0,30,30H502a10,10,0,0,0,10-10V218.75A10,10,0,0,0,502,208.75ZM308,34.14,369.83,96H318a10,10,0,0,1-10-10ZM180,492H136V422.37h44Zm104,0H240V365h44Zm104,0H344V295h44Z"></path><path d="M445.07,297.82a10,10,0,1,0,2.93,7.07A10,10,0,0,0,445.07,297.82Z"></path><path d="M145.58,54.73a10,10,0,0,0-10,10v18A92,92,0,1,0,237,184.15h18a10,10,0,0,0,10-10A119.55,119.55,0,0,0,145.58,54.73Zm0,191.4a72,72,0,0,1-10-143.26v71.28a10,10,0,0,0,10,10h71.28A72.09,72.09,0,0,1,145.58,246.13Zm10-82h0V75.23a99.61,99.61,0,0,1,88.92,88.92Z"></path><path d="M255,294.25H64a10,10,0,0,0,0,20H255a10,10,0,0,0,0-20Z"></path><path d="M128,342.5H64a10,10,0,0,0,0,20h64a10,10,0,0,0,0-20Z"></path><path d="M185.15,345.43a10,10,0,1,0,2.93,7.07A10.08,10.08,0,0,0,185.15,345.43Z"></path></svg></div>

                           <h3 class="ram-about-services-item-title ram-large-text">Syndicated Research</h3>
                           <div class="ram-about-services-item-description">It’s a tailor made solution and a powerful tool that leverages the collective knowledge and resources of multiple experts to provide a robust and insightful analysis of a specific subject.</div>
                        </div> 
                     </a>                       
                  </div>

                  <div class="ab-col ab-col-desktop-4 ab-col-tablet-12 services"  >
                     <a href="{{url('/customized-research')}}">
                        <div class="service-items">
                           <div class="ram-about-services-item-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><title>icon-services--custom-research</title><path d="M509.07,94.93l-92-92A10,10,0,0,0,410,0H130a30,30,0,0,0-30,30V143.85a10,10,0,0,0,20,0V30a10,10,0,0,1,10-10H401V81.13a30,30,0,0,0,30,30h61V482a10,10,0,0,1-10,10H256V433.91a50.09,50.09,0,0,0-39.17-48.65L167.7,374.52a2.72,2.72,0,0,1-.55-.18,61.91,61.91,0,0,0,22.85-48V283a42.08,42.08,0,0,0,8-24.73V223.85a10,10,0,0,0-10-10H118.64A52.69,52.69,0,0,0,66,266.48v59.83a61.92,61.92,0,0,0,22.74,47.95,3.09,3.09,0,0,1-.74.26L39.13,385.24A50.12,50.12,0,0,0,0,433.89V502a10,10,0,0,0,10,10H482a30,30,0,0,0,30-30V102A10,10,0,0,0,509.07,94.93ZM86,266.48a32.67,32.67,0,0,1,32.63-32.63H178v24.42a22.35,22.35,0,0,1-22.33,22.33H86Zm0,34.12h69.67A42,42,0,0,0,170,298.1v28.21a42,42,0,0,1-84,0V300.6Zm42,87.71a61.7,61.7,0,0,0,21.26-3.76,23.52,23.52,0,0,0,10.13,8.21L138,448.05V418.48a10,10,0,0,0-20,0v30.34L96.32,392.77a23.71,23.71,0,0,0,10.19-8.31A61.56,61.56,0,0,0,128,388.31ZM20,433.89a30,30,0,0,1,23.42-29.11l33.27-7.3L113.26,492H20ZM142.44,492,179,397.46l33.55,7.34A30,30,0,0,1,236,433.91V492ZM421,81.13v-46l56,56H431A10,10,0,0,1,421,81.13Z"></path><path d="M296,337a10,10,0,0,0-10,10V448a10,10,0,0,0,10,10h56a10,10,0,0,0,10-10V347a10,10,0,0,0-10-10Zm46,101H306V357h36Z"></path><path d="M382,308.28V448a10,10,0,0,0,10,10h56a10,10,0,0,0,10-10V308.28a10,10,0,0,0-10-10H392A10,10,0,0,0,382,308.28Zm20,10h36V438H402Z"></path><path d="M287,191h128.3a10,10,0,0,0,0-20H287a10,10,0,0,0,0,20Z"></path><path d="M287.84,111.13a10,10,0,1,0-7.07-2.93A10.08,10.08,0,0,0,287.84,111.13Z"></path><path d="M371.89,111.13a10,10,0,0,0,0-20H328.5a10,10,0,0,0,0,20Z"></path><path d="M196.71,111.13h40a10,10,0,0,0,10-10v-40a10,10,0,0,0-10-10h-40a10,10,0,0,0-10,10v40A10,10,0,0,0,196.71,111.13Zm10-40h20v20h-20Z"></path><path d="M186.71,181.07a10,10,0,0,0,10,10h40a10,10,0,0,0,10-10v-40a10,10,0,0,0-10-10h-40a10,10,0,0,0-10,10Zm20-30h20v20h-20Z"></path><path d="M228,313.34a10,10,0,1,0,7.07,2.93A10.08,10.08,0,0,0,228,313.34Z"></path><path d="M255.56,311.4a10,10,0,0,0,13.16,5.19l136.62-59.31a10,10,0,0,0,18.49,6.11l15.5-25.5a10,10,0,0,0-8.54-15.2h-31a10,10,0,0,0-6.16,17.87L260.75,298.24A10,10,0,0,0,255.56,311.4Z"></path><path d="M117.07,190.92a10,10,0,1,0-7.07,2.93A10.09,10.09,0,0,0,117.07,190.92Z"></path></svg></div>

                           <h3 class="ram-about-services-item-title ram-large-text">Customized Research</h3>
                           <div class="ram-about-services-item-description">We don't believe in one-size-fits-all. We tailor our research approaches to meet your unique needs, ensuring that you receive the most relevant and actionable information.</div>
                        </div>  
                     </a>                      
                  </div>

                  <div class="ab-col ab-col-desktop-4 ab-col-tablet-12 services "  >
                     <a href="{{url('/competitive-analysis')}}">
                        <div class="service-items">
                           <div class="ram-about-services-item-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><title>icon--services--conference-training</title><path d="M458.13,409.17a46.19,46.19,0,0,0,8.33-26.49v-9.11a46.44,46.44,0,1,0-92.87,0v9.11a46.18,46.18,0,0,0,8.32,26.49A55.51,55.51,0,0,0,338,432.94a55.5,55.5,0,0,0-43.87-23.77,46.19,46.19,0,0,0,8.33-26.49v-9.11a46.44,46.44,0,1,0-92.87,0v9.11A46.18,46.18,0,0,0,218,409.17,55.5,55.5,0,0,0,174,433a55.5,55.5,0,0,0-43.93-23.86,46.18,46.18,0,0,0,8.32-26.49v-9.11a46.43,46.43,0,1,0-92.86,0v9.11a46.18,46.18,0,0,0,8.32,26.49A55.61,55.61,0,0,0,0,464.68V502a10,10,0,0,0,10,10H502a10,10,0,0,0,10-10V464.68A55.61,55.61,0,0,0,458.13,409.17Zm-64.54-35.6a26.44,26.44,0,1,1,52.87,0v9.11a26.44,26.44,0,1,1-52.87,0Zm-164,0a26.44,26.44,0,1,1,52.87,0v9.11a26.44,26.44,0,1,1-52.87,0v-9.11Zm-164.09,0a26.44,26.44,0,1,1,52.87,0v9.11a26.44,26.44,0,1,1-52.87,0ZM164,492H20V464.68a35.58,35.58,0,0,1,35.54-35.55h72.87A35.59,35.59,0,0,1,164,464.68V492Zm20.12-27.32a35.59,35.59,0,0,1,35.55-35.55H292.5a35.59,35.59,0,0,1,35.55,35.55V492h-144V464.68ZM492,492H348V464.68a35.59,35.59,0,0,1,35.55-35.55h72.87A35.59,35.59,0,0,1,492,464.68V492Z"></path><path d="M187,268.78a10,10,0,1,0,7.07,2.93A10,10,0,0,0,187,268.78Z"></path><path d="M64,288.78h83a10,10,0,1,0,0-20H74V198a33.75,33.75,0,0,1,33.71-33.72h16.53V211a10,10,0,0,0,16.92,7.21L177,183.79V213.9a10,10,0,1,0,20,0V183.79l35.82,34.42A10,10,0,0,0,249.69,211V164.25h16.53A33.75,33.75,0,0,1,299.93,198v70.81h-73a10,10,0,0,0,0,20h83a10,10,0,0,0,10-10V198a53.77,53.77,0,0,0-53.7-53.72H233.4a63.86,63.86,0,0,0,17.66-44.12v-36a64.11,64.11,0,1,0-128.21,0v36a63.89,63.89,0,0,0,17.65,44.12H107.69A53.77,53.77,0,0,0,54,198v80.81A10,10,0,0,0,64,288.78Zm80.23-124.53h24.22l-24.22,23.28V164.25Zm85.49,23.28-24.22-23.27H229.7v23.27ZM142.84,64.12a44.11,44.11,0,0,1,88-4.58l-20.9-12.28a10,10,0,0,0-12.73,2.2,49.33,49.33,0,0,1-37.9,17.69H142.84v-3Zm0,36v-13H159.3a69.24,69.24,0,0,0,47.34-18.63l24.42,14.35v17.26a44.11,44.11,0,1,1-88.22,0Z"></path><path d="M322.74,162.7a10,10,0,0,0,9.61.61l33.89-15.92H490.42a21.48,21.48,0,0,0,21.45-21.46V21.46A21.48,21.48,0,0,0,490.42,0H339.55A21.49,21.49,0,0,0,318.1,21.46V154.25A10,10,0,0,0,322.74,162.7ZM338.1,21.46A1.45,1.45,0,0,1,339.55,20H490.42a1.46,1.46,0,0,1,1.46,1.46V125.93a1.47,1.47,0,0,1-1.46,1.46H364a10,10,0,0,0-4.25,1L338.1,138.51Z"></path><path d="M367.34,62.58h95.29a10,10,0,0,0,0-20H367.34a10,10,0,0,0,0,20Z"></path><path d="M367.34,102.58h65.74a10,10,0,0,0,0-20H367.34a10,10,0,0,0,0,20Z"></path></svg></div>

                           <h3 class="ram-about-services-item-title ram-large-text">Competitive Analysis</h3>
                           <div class="ram-about-services-item-description">It involves evaluating and understanding your competitors' strengths, weaknesses, strategies, and market positioning to make informed decisions and gain a competitive edge.</div>
                        </div> 
                     </a>                       
                  </div>

                  <div class="ab-col ab-col-desktop-4 ab-col-tablet-12 services service-2"  >
                     <a href="{{url('/company-profile')}}">
                        <div class="service-items">
                           <div class="ram-about-services-item-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><title>icon--services--subscription</title><path d="M396,151.21a90.26,90.26,0,0,0-90-83.53A90.75,90.75,0,0,0,272.76,74,112.37,112.37,0,0,0,68.68,163.11,121.48,121.48,0,0,0,121.46,394h6v78a20,20,0,0,0,20,20H320.9a20,20,0,0,0,20-20V453.34h17.58a20,20,0,0,0,20-20V394h12.13A121.45,121.45,0,0,0,396,151.21ZM330.94,433.33h-.19l-145.74,0V380.13a10,10,0,1,0-20,0v53.23a20,20,0,0,0,20,20H320.86l0,18.65-173.42,0V383.94l0-137.08H165v53.43a10,10,0,0,0,20,0l0-63.06c0-.12,0-.25,0-.38s0-.26,0-.39V208.2h9a29.46,29.46,0,0,0,5.19,10.53l18.26,23.69a29.62,29.62,0,0,0,49.14,0l18.26-23.69A29.6,29.6,0,0,0,290,208.2h10v28.68a27.29,27.29,0,0,0,27.25,27.27H358.4l0,119.42c0,.14,0,.27,0,.41s0,.27,0,.41v48.94ZM261.59,191.14a9.56,9.56,0,0,1,9.32,8.3,9.48,9.48,0,0,1-1.9,7.07l-18.48,24a7,7,0,0,0-.46.65,9.61,9.61,0,0,1-16.09,0,7,7,0,0,0-.46-.65l-18.48-24a9.54,9.54,0,0,1,1.78-13.41,9.23,9.23,0,0,1,5.64-2,10,10,0,0,0,9.94-10v-33.3a9.63,9.63,0,0,1,19.25,0v33.3A10,10,0,0,0,261.59,191.14Zm81.91,53H327.25a7.34,7.34,0,0,1-7.23-7.26V221.64Zm47,129.84H378.41V254.14a10.08,10.08,0,0,0-3.09-7.22L316.93,191a10.12,10.12,0,0,0-6.92-2.78H288.25a29.9,29.9,0,0,0-16.59-15.26v-25.1a29.64,29.64,0,0,0-59.27,0v25.09a28.8,28.8,0,0,0-7.82,4.36,29.26,29.26,0,0,0-8.76,10.91H185a20,20,0,0,0-20,19.95v18.71H147.45a20,20,0,0,0-20,20V374h-6A101.47,101.47,0,0,1,84.67,178a10,10,0,0,0,5.72-12.87,92.35,92.35,0,0,1,169.13-73.7,10,10,0,0,0,13.64,4.4,70.28,70.28,0,0,1,103,65,10,10,0,0,0,10.39,10.4c1.32-.06,2.63-.08,4-.08a101.44,101.44,0,1,1,0,202.88Z"></path><path d="M320,288.18H239.43a10,10,0,0,0,0,20H320a10,10,0,0,0,0-20Z"></path><path d="M320,334.5H220.18a10,10,0,0,0,0,20H320a10,10,0,0,0,0-20Z"></path><path d="M320,380.81H220.18a10,10,0,0,0,0,20H320a10,10,0,0,0,0-20Z"></path><path d="M175,330a10,10,0,0,0-10,10v.2a10,10,0,1,0,20,0V340A10,10,0,0,0,175,330Z"></path></svg></div>

                           <h3 class="ram-about-services-item-title ram-large-text">Company Profile</h3>
                           <div class="ram-about-services-item-description">It serves as a snapshot of the company, offering essential information to help stakeholders, partners, investors, customers, and other interested parties understand the company's background, mission, products or services, achievements, and future goals.</div>
                        </div> 
                     </a>                       
                  </div>

                  <div class="ab-col ab-col-desktop-4 ab-col-tablet-12 services"  >
                     <a href="{{url('/biographies')}}">
                        <div class="service-items">
                           <div class="ram-about-services-item-icon"><svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><title>icon--services--consultancy</title><path d="M179.52,338.92l-36.39-8V323.5a54.15,54.15,0,0,0,21.1-42.89V245.23a54.23,54.23,0,0,0-108.46,0v35.38A54.15,54.15,0,0,0,77.13,323.7v7.23l-36.61,8A51.82,51.82,0,0,0,0,389.27V502a10,10,0,0,0,10,10H210a10,10,0,0,0,10-10V483.5a10,10,0,0,0-20,0V492H20V389.27a31.71,31.71,0,0,1,24.79-30.79l44.47-9.73A10,10,0,0,0,97.13,339v-5.69a54.28,54.28,0,0,0,26-.06V339a10,10,0,0,0,7.85,9.77l44.25,9.71A31.72,31.72,0,0,1,200,389.25v12.42a10,10,0,1,0,20,0V389.25A51.83,51.83,0,0,0,179.52,338.92ZM75.77,280.61V245.23a34.23,34.23,0,0,1,68.46,0v35.38a34.23,34.23,0,0,1-68.46,0Z"></path><path d="M456.23,280.61V266H482a30,30,0,0,0,30-30V140a30,30,0,0,0-30-30H438.71a10,10,0,0,0,0,20H482a10,10,0,0,1,10,10v96a10,10,0,0,1-10,10H456.23v-.77a54.23,54.23,0,0,0-108.46,0V246H314a10,10,0,0,0-10,10v15.86l-22.93-22.93A10,10,0,0,0,274,246H258a10,10,0,0,1-10-10V140a10,10,0,0,1,10-10h99.77a10,10,0,0,0,0-20h-18.1V30a30,30,0,0,0-30-30H30A30,30,0,0,0,0,30V135a30,30,0,0,0,30,30H159.83v21.33a10,10,0,0,0,17.07,7.07L205.31,165H228v71a30,30,0,0,0,30,30h11.86l37.07,37.07A10,10,0,0,0,324,296V266h23.77v14.61a54.17,54.17,0,0,0,21.36,43.09v7.23l-36.61,8A51.82,51.82,0,0,0,292,389.27V502a10,10,0,0,0,10,10H502a10,10,0,0,0,10-10V389.25a51.83,51.83,0,0,0-40.48-50.33l-36.39-8V323.5A54.15,54.15,0,0,0,456.23,280.61ZM201.17,145a10,10,0,0,0-7.07,2.93l-14.27,14.26V155a10,10,0,0,0-10-10H30a10,10,0,0,1-10-10V30A10,10,0,0,1,30,20H309.67a10,10,0,0,1,10,10v80H258a30,30,0,0,0-30,30v5Zm188,188.29a54.28,54.28,0,0,0,26-.06v4l-13,35.43-13-35.43ZM402,211a34.26,34.26,0,0,1,34.23,34.23v7.58H421.48a75.55,75.55,0,0,1-51.38-20A34.27,34.27,0,0,1,402,211Zm-34.23,45.43a95.43,95.43,0,0,0,53.71,16.39h14.75v7.79a34.23,34.23,0,0,1-68.46,0V256.43Zm99.46,102A31.72,31.72,0,0,1,492,389.25V492H312V389.27a31.71,31.71,0,0,1,24.79-30.79l35.95-7.86,20,54.49a10,10,0,0,0,18.78,0l20-54.49Z"></path><path d="M398.72,130a10,10,0,1,0-7.08-2.93A10.05,10.05,0,0,0,398.72,130Z"></path><path d="M210,433.5a10,10,0,1,0,7.07,2.93A10.08,10.08,0,0,0,210,433.5Z"></path><path d="M205.5,96.67H55.5a10,10,0,0,0,0,20h150a10,10,0,0,0,0-20Z"></path><path d="M55.5,68.33H242.75a10,10,0,0,0,0-20H55.5a10,10,0,0,0,0,20Z"></path><path d="M282.75,68.33a10,10,0,1,0-7.07-2.93A10,10,0,0,0,282.75,68.33Z"></path></svg></div>

                           <h3 class="ram-about-services-item-title ram-large-text">Biographies</h3>
                           <div class="ram-about-services-item-description">The section can be written about individuals from various walks of life, including historical figures, public figures, artists, leaders, celebrities, etc. These accounts aim to provide insight on a person's character, influences, achievements, and a broader context of their lifes.</div>
                        </div> 
                     </a>                       
                  </div>

               </div>
            </div>
      </section>
         <section class="ab-about-numbers ab-bg-subtle-gray">
         <div class="text-center center ram-about-brands ram-align-center" id="home-page-clients">
            <div class="mb-4 heading">
               <h2 class="beta ram-tiny-title">Trusted by the best </h2>
            </div>
            <div class="clearfix">
               <ul class="clearfix">
                  <li><img loading="lazy" src="{{asset('assets/images/clients/3m.png')}}" alt="General_Electric" title="General_Electric"  style="margin-top: -21px"></li>
                  <li><img loading="lazy" src="{{asset('assets/images/clients/ge.png')}}" alt="nokia" title="nokia"  style="margin-top: -26px"></li>
                  <li><img loading="lazy" src="{{asset('assets/images/clients/pg.png')}}" alt="oppo" title="oppo" style="margin-top: -26px"></li>
                  <li><img loading="lazy" src="{{asset('assets/images/clients/siemens.png')}}" alt="Samsung" title="Samsung"style="margin-top: -21px"></li>
                  <li><img loading="lazy" src="{{asset('assets/images/clients/ongc.png')}}" alt="nokia" title="nokia" style="margin-top: -26px"></li>
                  <li><img loading="lazy" src="{{asset('assets/images/clients/honeywell.png')}}" alt="oppo" title="oppo" = style="margin-top: -26px"></li>

               </ul>
            </div>
         </div>
      </section>
   </div>
</main>
@endsection
