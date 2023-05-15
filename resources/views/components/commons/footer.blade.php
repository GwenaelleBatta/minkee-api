<footer class="flex flex-col bg-yellow-100 xl:px-40">
    <div class="flex-col flex-1 px-10 xl:px-0 md:flex-row flex justify-between md:items-center mt-10">
        <div class="flex-1 flex flex-col items-center mb-8 xl:mb-0">
            <div class="group relative">
                <svg class="md:not-sr-only sr-only" xmlns="http://www.w3.org/2000/svg" width="170.001" height="77.656"
                     viewBox="0 0 170.001 77.656">
                    <g id="Groupe_284" data-name="Groupe 284" transform="translate(-230.999 -70.345)">
                        <path id="Soustraction_1" data-name="Soustraction 1"
                              d="M4116.213,11516.657h-48.141a12.468,12.468,0,0,1-4.4-.723,3.3,3.3,0,0,1-2.414-3.093,2.349,2.349,0,0,1,.648-1.733c.956-.958,2.789-1.09,4.628-1.09.287,0,.581,0,.818.006l.208,0,.513,0h20.255v-6.63h-29.886a14.443,14.443,0,0,1-14.443-14.443v-35.513a14.443,14.443,0,0,1,14.443-14.442h67.4a14.33,14.33,0,0,1,8.646,2.871,14.562,14.562,0,0,1,5.151,7.285h-6.012a9.381,9.381,0,0,0-7.784-4.529h-67.4a9.642,9.642,0,0,0-5.324,1.756,7.99,7.99,0,0,0-2.4,2.7,9.666,9.666,0,0,0-1.092,4.361v35.513a8.727,8.727,0,0,0,2.232,6.449,9.375,9.375,0,0,0,6.58,2.366h67.4a10.458,10.458,0,0,0,3.925-.761,7.37,7.37,0,0,0,3.823-3.493h5.96a14.449,14.449,0,0,1-13.708,9.882h-29.885v6.63h20.255a17.816,17.816,0,0,1,4.405.409c1.6.432,2.41,1.24,2.41,2.4,0,1.5-1.311,2.407-2.411,2.905A11.38,11.38,0,0,1,4116.213,11516.657Z"
                              transform="translate(-3813 -11368.656)" fill="rgba(111, 112, 77, 0.3)"/>
                        <g id="Groupe_251" data-name="Groupe 251" transform="translate(0 63)">
                            <text class="group-hover:fill-green-700" id="TecWeb_" data-name="TecWeb "
                                  transform="translate(242 47)" fill="#da953a" font-size="35"
                                  font-family="Montserrat-Bold, Montserrat" font-weight="700">
                                <tspan x="0" y="0">TecWeb</tspan>
                            </text>
                            <text class="group-hover:fill-green-700" id="Le_site_de_l_option_web_de_la_HEPL"
                                  data-name="Le site de l’option web de la HEPL" transform="translate(242 58)"
                                  fill="#da953a" font-size="11" font-family="Hind-Regular, Hind">
                                <tspan x="0" y="0">Le site de l’option web de la HEPL</tspan>
                            </text>
                        </g>
                    </g>
                </svg>
                <a href="/{{app()->getLocale()}}" class="linkcard">{{__('nav.nav_link_home')}}</a>
            </div>
            <div class="mt-6" itemscope itemtype="https://schema.org/Organization">
                <p itemprop="legalName" class="mb-2 2xl:text-lg">{{__('nav.nav_informations.name')}}</p>
                <div itemscope itemtype="https://schema.org/PostalAddress">
                    <p itemprop="streetAddress" class="mb-2 2xl:text-lg">{{__('nav.nav_informations.street')}}</p>
                    <p itemprop="postalCode" class="mb-2 2xl:text-lg">{{__('nav.nav_informations.city')}}</p>
                </div>
            </div>
        </div>
        <nav class="flex-1 flex-col items-center justify-center flex md:block border-y-2 border-y-orange-500/40 md:border-y-0 py-12 md:py-0 md:border-r-2 md:border-r-orange-500/40 md:border-l-2 md:border-l-orange-500/40 md:px-12 xl:px-24" aria-labelledby="navigationFooter">
            <h2 class="text-green-500 font-medium md:text-xl text-2xl 2xl:text-3xl text-center mb-8 font-sans" role="heading" aria-level="2" id="navigationFooter">{{__('nav.nav_footer_nav')}}</h2>
            <div class="flex flex-1 justify-between items-center text-xl 2xl:text-2xl text-green-500">
                <ul class="mr-14">
                    <li class="hover:text-orange-500 mb-6"><a href="/{{app()->getLocale()}}/forum/index">{{__('nav.nav_navigation.forum')}}</a></li>
                    <li class="hover:text-orange-500 mb-6"><a href="/{{app()->getLocale()}}/news/index">{{__('nav.nav_navigation.actualities')}}</a></li>
                    <li class="hover:text-orange-500 mb-6"><a href="/{{app()->getLocale()}}/bottin">{{__('nav.nav_navigation.people')}}</a></li>
                    <li class="hover:text-orange-500"><a href="/{{app()->getLocale()}}/project/index">{{__('nav.nav_navigation.project')}}</a></li>
                </ul>
                <ul>
                    <li class="hover:text-orange-500 mb-6"><a href="/{{app()->getLocale()}}/entreprise/internship">{{__('nav.nav_navigation.intership')}}</a></li>
                    <li class="hover:text-orange-500 mb-6"><a href="/{{app()->getLocale()}}/bottin/alumni">{{__('nav.nav_navigation.alumni')}}</a></li>
                    <li class="hover:text-orange-500 mb-6"><a href="/{{app()->getLocale()}}/contact/student">{{__('nav.nav_navigation.contact')}}</a></li>
                    <li class="hover:text-orange-500"><a href="/{{app()->getLocale()}}/technical/tuto">{{__('nav.nav_navigation.tuto')}}</a></li>
                </ul>
            </div>
        </nav>
        <section class="flex-1 flex-col items-center justify-center  flex xl:block py-12 xl:py-0" aria-labelledby="socials">
            <h2 class="text-green-500 font-medium md:text-xl text-2xl 2xl:text-3xl text-center mb-8 font-sans " role="heading" aria-level="2" id="socials">{{__('nav.nav_footer_socials')}}</h2>
            <ul class="flex flex-1 justify-between items-center xl:items-start xl:ml-16 flex-col text-xl 2xl:text-2xl text-green-500 ">
                    <li class="hover:text-orange-500 mb-6 flex">
                        <svg class="group-hover:scale-110 mr-2" width="20" viewBox="0 0 3.88 3.88" xmlns="http://www.w3.org/2000/svg"><path d="m2.98.67c-.13 0-.23.1-.23.23s.1.23.23.23.23-.1.23-.23-.1-.23-.23-.23zm.89.47c0-.16-.03-.32-.09-.47-.05-.13-.13-.25-.23-.34-.1-.1-.21-.18-.34-.22-.15-.06-.31-.09-.47-.09-.21-.01-.27-.01-.8-.01s-.59 0-.8.01c-.16 0-.32.03-.47.09-.13.05-.25.12-.34.22-.1.1-.18.21-.22.34-.06.15-.1.31-.1.47-.01.21-.01.27-.01.8s0 .59.01.8c0 .16.03.32.09.47.05.13.12.25.22.34.1.1.21.18.34.22.15.06.31.09.47.09.21.01.27.01.8.01s.59 0 .8-.01c.16 0 .32-.03.47-.09.13-.05.25-.12.34-.22.1-.1.18-.21.23-.34.06-.15.09-.31.09-.47 0-.21.01-.27.01-.8s0-.59-.01-.8zm-.35 1.58c0 .12-.02.25-.07.36-.03.08-.08.16-.15.22-.06.06-.14.11-.22.15-.12.04-.24.06-.36.07-.19 0-.27.01-.78.01s-.58 0-.78-.01c-.13 0-.26-.02-.38-.06-.08-.03-.15-.08-.21-.15-.06-.06-.11-.14-.14-.22-.05-.12-.07-.24-.08-.37 0-.19-.01-.27-.01-.78s0-.58.01-.78c0-.13.02-.25.07-.37.03-.08.09-.15.15-.21.06-.07.13-.12.21-.16.12-.04.24-.06.37-.07.19 0 .27-.01.78-.01s.58 0 .78.01c.12 0 .25.02.36.07.09.03.17.09.23.16.06.06.11.13.15.21.04.12.07.24.07.37 0 .19.01.27.01.78s0 .58-.01.78zm-1.58-1.78c-.55 0-.99.45-.99 1s.45.99 1 .99.99-.45.99-1-.44-.99-.99-1zm0 1.64c-.36 0-.65-.29-.65-.65s.29-.65.65-.65.65.29.65.65c0 .36-.29.65-.65.65z" fill="#da953a"/></svg>
                        <a href="/{{app()->getLocale()}}">{{__('nav.nav_socials.instagram')}}</a>
                    </li>
                    <li class="hover:text-orange-500 mb-6 flex">
                            <svg class="group-hover:scale-110 mr-2" width="20" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24"><g data-name="&lt;Group&gt;"><path fill="none" stroke="#da953a" stroke-linecap="round" stroke-linejoin="round" d="M21 1.5H3A1.5 1.5 0 0 0 1.5 3v18A1.5 1.5 0 0 0 3 22.5h8.5v-8h-2v-3h2v-2a4 4 0 0 1 4-4h3v3h-3a1 1 0 0 0-1 1v2h4l-.5 3h-3.5v8H21a1.5 1.5 0 0 0 1.5-1.5V3A1.5 1.5 0 0 0 21 1.5Z" data-name="&lt;Path&gt;"/></g></svg>
                        <a href="/{{app()->getLocale()}}">{{__('nav.nav_socials.facebook')}}</a>
                    </li>
                    <li class="hover:text-orange-500 mb-6 flex">
                            <svg class="group-hover:scale-110 mr-2" width="20" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24"><path d="M22.99121,3.9502a.99942.99942,0,0,0-1.51074-.85938,7.47956,7.47956,0,0,1-1.873.793,5.15234,5.15234,0,0,0-3.374-1.24219,5.23238,5.23238,0,0,0-5.22363,5.06348A11.03194,11.03194,0,0,1,4.19629,3.78125,1.01154,1.01154,0,0,0,3.33887,3.416a.99852.99852,0,0,0-.78516.5,5.2755,5.2755,0,0,0-.24219,4.76855l-.00195.00195a1.0411,1.0411,0,0,0-.49512.88868,3.04174,3.04174,0,0,0,.02637.43945,5.1854,5.1854,0,0,0,1.56836,3.3125.99813.99813,0,0,0-.06641.76953,5.20436,5.20436,0,0,0,2.36231,2.92187,7.46464,7.46464,0,0,1-3.58985.44825.99975.99975,0,0,0-.665,1.833A12.94248,12.94248,0,0,0,8.46,21.36133,12.7878,12.7878,0,0,0,20.9248,11.998,12.82166,12.82166,0,0,0,21.46,8.35156c0-.06543,0-.13281-.001-.20019A5.76963,5.76963,0,0,0,22.99121,3.9502ZM19.68457,7.16211a.995.995,0,0,0-.2334.70215c.00977.165.00879.331.00879.4873a10.82371,10.82371,0,0,1-.4541,3.08106A10.68457,10.68457,0,0,1,8.46,19.36133a10.93791,10.93791,0,0,1-2.55078-.30078,9.47951,9.47951,0,0,0,2.94238-1.56348A1.00033,1.00033,0,0,0,8.25,15.71094a3.208,3.208,0,0,1-2.21387-.93457q.22413-.04248.44532-.10547a1.00026,1.00026,0,0,0-.08008-1.94336,3.19824,3.19824,0,0,1-2.25-1.72559,5.29929,5.29929,0,0,0,.54492.0459,1.02093,1.02093,0,0,0,.9834-.69629A.9998.9998,0,0,0,5.2793,9.21484,3.19559,3.19559,0,0,1,3.85547,6.542c0-.0664.00195-.13281.00586-.19824a13.01365,13.01365,0,0,0,8.209,3.47949,1.02046,1.02046,0,0,0,.81739-.3584,1.00037,1.00037,0,0,0,.206-.86816,3.15653,3.15653,0,0,1-.08691-.72852A3.23,3.23,0,0,1,16.2334,4.6416a3.18428,3.18428,0,0,1,2.34472,1.02051A.993.993,0,0,0,19.499,5.96a9.27073,9.27073,0,0,0,1.21192-.32226A6.68126,6.68126,0,0,1,19.68457,7.16211Z" fill="#da953a"/></svg>
                        <a href="/{{app()->getLocale()}}">{{__('nav.nav_socials.twitter')}}</a></li>
                    <li class="hover:text-orange-500 flex">
                            <svg class="group-hover:scale-110 mr-2" width="20" xmlns="http://www.w3.org/2000/svg" data-name="Layer 1" viewBox="0 0 24 24"><path d="M12,2.2467A10.00042,10.00042,0,0,0,8.83752,21.73419c.5.08752.6875-.21247.6875-.475,0-.23749-.01251-1.025-.01251-1.86249C7,19.85919,6.35,18.78423,6.15,18.22173A3.636,3.636,0,0,0,5.125,16.8092c-.35-.1875-.85-.65-.01251-.66248A2.00117,2.00117,0,0,1,6.65,17.17169a2.13742,2.13742,0,0,0,2.91248.825A2.10376,2.10376,0,0,1,10.2,16.65923c-2.225-.25-4.55-1.11254-4.55-4.9375a3.89187,3.89187,0,0,1,1.025-2.6875,3.59373,3.59373,0,0,1,.1-2.65s.83747-.26251,2.75,1.025a9.42747,9.42747,0,0,1,5,0c1.91248-1.3,2.75-1.025,2.75-1.025a3.59323,3.59323,0,0,1,.1,2.65,3.869,3.869,0,0,1,1.025,2.6875c0,3.83747-2.33752,4.6875-4.5625,4.9375a2.36814,2.36814,0,0,1,.675,1.85c0,1.33752-.01251,2.41248-.01251,2.75,0,.26251.1875.575.6875.475A10.0053,10.0053,0,0,0,12,2.2467Z" fill="#da953a"/></svg>
                        <a href="/{{app()->getLocale()}}">{{__('nav.nav_socials.github')}}</a></li>
            </ul>
        </section>
    </div>
    <div class="px-10 2xl:px-48 xl:px-32 lg:px-16 items-center flex-col flex flex-1 justify-between my-14 gap-y-3 md:flex-row md:items-start xl:gap-y-0">
        <p class="mb-2 2xl:text-lg">{{__('nav.nav_footer_copyright')}}</p>
        <div class="flex-1 flex gap-8 md:justify-end 2xl:text-lg">
        <a class=" hover:text-orange-500 xl:mr-4" href="/{{app()->getLocale()}}/legals">{{__('nav.nav_footer_legals')}}</a>
        <a href="/{{app()->getLocale()}}">{{__('nav.nav_footer_generales')}}</a>
        </div>
    </div>
</footer>
