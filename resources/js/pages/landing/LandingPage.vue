<template>
    <div id="landingComponent" class="landing" :style="[ isLoggedIn ? landingLoggedInStyle : '' ]">
        <div v-show="!isLoggedIn" class="about">
            <h3 class="font-bold leadinng-8">
            <span class="text-b-info">{{ lang.get('words.Chronostep') }}</span>
            <span class="text-b-create">{{ lang.get('words.Community') }}</span>
            </h3>
            <div>
                <p class="font-bold">{{ lang.get('words.AboutHeader1') }}</p>
                <p class="mt-6">{{ lang.get('words.AboutHeader2') }}</p>
            </div>
            <div class="grid font-bold">
                <button class="px-4 py-2 border-2 border-b-link text-b-link rounded-lg">
                    <router-link :to="{ name: 'register' }">{{ lang.get('words.CreateAccount') }}</router-link>
                </button>
                <button class="px-4 py-2 text-b-mute">
                    <router-link :to="{ name: 'login' }">{{ lang.get('words.Login') }}</router-link>
                </button>
            </div>
        </div>
        <div v-show="isLoggedIn" class="listing">
            <aside class="" aria-label="Sidebar">
                <div class="overflow-y-auto rounded">
                    <ul class="space-y-2">
                        <li>
                            <router-link :to="{ name: 'home' }" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-bt-secondary">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            <span class="ml-3">Home</span>
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'listing' }" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-bt-secondary">
                            <i class="fa-solid fa-list"></i>
                            <span class="flex-1 ml-3 whitespace-nowrap">Listings</span>
                            <!-- <span class="inline-flex justify-center items-center px-2 ml-3 text-sm font-medium text-gray-800 bg-gray-200 rounded-full dark:bg-gray-700 dark:text-gray-300">Pro</span> -->
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'favorites' }" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-bt-secondary">
                            <i class="fa-solid fa-star"></i>
                            <span class="flex-1 ml-3 whitespace-nowrap">Favorites</span>
                            <!-- <span class="inline-flex justify-center items-center p-3 ml-3 w-3 h-3 text-sm font-medium text-blue-600 bg-blue-200 rounded-full dark:bg-blue-900 dark:text-blue-200">3</span> -->
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'team' }" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-bt-secondary">
                            <i class="fa-solid fa-people-group"></i>
                            <span class="flex-1 ml-3 whitespace-nowrap">Team</span>
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'faq' }" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-bt-secondary">
                            <i class="fa-solid fa-circle-question"></i>
                            <span class="flex-1 ml-3 whitespace-nowrap">FAQs</span>
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'about' }" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-bt-secondary">
                            <i class="fa-solid fa-circle-info"></i>
                            <span class="flex-1 ml-3 whitespace-nowrap">About</span>
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'guides' }" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-bt-secondary">
                            <i class="fa-regular fa-note-sticky"></i>
                            <span class="flex-1 ml-3 whitespace-nowrap">Guides</span>
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'code-of-conduct' }" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-bt-secondary">
                            <i class="fa-solid fa-thumbs-up"></i>
                            <span class="flex-1 ml-3 whitespace-nowrap">Code of Conduct</span>
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'privacy-policy' }" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-bt-secondary">
                            <i class="fa-solid fa-shield-halved"></i>
                            <span class="flex-1 ml-3 whitespace-nowrap">Privacy Policy</span>
                            </router-link>
                        </li>
                        <li>
                            <router-link :to="{ name: 'terms' }" class="flex items-center p-2 text-base font-normal rounded-lg text-white hover:bg-bt-secondary">
                            <i class="fa-solid fa-handshake-simple"></i>
                            <span class="flex-1 ml-3 whitespace-nowrap">Terms of Use</span>
                            </router-link>
                        </li>
                        <li>
                            <a @click="signOut()" href="#" class="flex items-center p-2 text-base font-normal rounded-lg text-b-danger hover:bg-bt-secondary">
                            <i class="fa-solid fa-right-from-bracket"></i>
                            <span class="flex-1 ml-3 whitespace-nowrap">Logout</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </aside>
        </div>
        <div class="posts">
            <ul class="nav nav-tabs flex gap-6 list-none border-b-0 pl-0 font-bold" id="tabs-tab" role="tablist">
                <li class="nav-item" role="presentati on">
                    <a @click="setTab(POST_CATEGORY.relevant)" href="#relevant" :class="[
                        { 'text-b-mute': postCategory == POST_CATEGORY.relevant },
                        { 'text-b-primary': postCategory != POST_CATEGORY.relevant }
                        ]" id="relevant-tab" data-bs-toggle="pill" data-bs-target="#relevant" role="tab" aria-controls="relevant"
                    aria-selected="true">{{ lang.get('words.Relevant') }}</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a @click="setTab(POST_CATEGORY.latest)" href="#latest" :classpapi="[
                        { 'text-b-mute': postCategory == POST_CATEGORY.latest },
                        { 'text-b-primary': postCategory != POST_CATEGORY.latest }
                         ]" id="latest-tab" data-bs-toggle="pill" data-bs-target="#latest" role="tab"
                    aria-controls="latest" aria-selected="false">{{ lang.get('words.Latest') }}</a>
                </li>
                <li class="nav-item" role="presentation" >
                    <a @click="setTab(POST_CATEGORY.top)" href="#top" :class="[
                        { 'text-b-mute': postCategory == POST_CATEGORY.top },
                        { 'text-b-primary': postCategory != POST_CATEGORY.top }
                        ]" id="top-tab" data-bs-toggle="pill" data-bs-target="#top" role="tab"
                    aria-controls="top" aria-selected="false">{{ lang.get('words.Top') }}</a>
                </li>
            </ul>

            <div class="tab-content" id="tabs-tabContent">
                <div v-show="postCategory == POST_CATEGORY.relevant" class="max-h-[83.5vh] overflow-y-scroll tab-pane fade show active grid gap-6" id="relevant" role="tabpanel" aria-labelledby="relevant-tab">
                    <div v-for="(post, index) in posts" :key="index" class="grid p-6 gap-6 border border-white bg-bt-secondary rounded-lg">
                        <div class="flex gap-6">
                            <div>
                                <img src="../../../assets/icons/user-logo.png" class="h-12 border border-white rounded-full"/>
                            </div>
                            <div class="grid">
                                <span class="text-b-info font-bold">{{ _.get(post, 'user.name', '') }}</span>
                                <span class="text-b-mute">{{ _.get(post, 'user.job', '') }}</span>
                                <span class="text-gray-700"><small>October 3, 2022 | 8:02 AM</small></span>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-bold">{{ _.get(post, 'title', '') }}</h3>
                        </div>
                        <div class="text-b-dark">
                            <span v-for="(category, index) in post.categories" :key="index">{{ category + ' '}}</span>
                        </div>
                        <div class="flex gap-6">
                            <span><i class="fa-regular fa-thumbs-up pr-3"></i><span class="text-b-mute">{{ lang.get('words.Likes') }}</span></span>
                            <span><i class="fa-regular fa-comment pr-3"></i><span class="text-b-mute">{{ lang.get('words.Comments') }}</span></span>
                            <span><i class="fa-regular fa-star pr-3"></i><span class="text-b-mute">{{ lang.get('words.Favorites') }}</span></span>
                        </div>
                    </div>
                </div>
                <div v-show="postCategory == POST_CATEGORY.latest" class="tab-pane fade" id="latest" role="tabpanel" aria-labelledby="latest-tab">
                    <div class="grid p-6 gap-6 border border-white bg-bt-secondary rounded-lg">
                        <div class="flex gap-6">
                            <div>
                                <img src="../../../assets/icons/user-logo.png" class="h-12 border border-white rounded-full"/>
                            </div>
                            <div class="grid">
                                <span class="text-b-info font-bold">Fel Reind Entica</span>
                                <span class="text-b-mute">Software Engineer</span>
                                <span class="text-gray-700"><small>October 3, 2022 | 8:02 AM</small></span>
                            </div>
                        </div>
                        <div>
                            <h3 class="font-bold">16 Libraries You Should Know as a React Developer. See my post now and read</h3>
                        </div>
                        <div class="text-b-dark">
                            <span>#webdev</span>
                            <span>#coding</span>
                            <span>#react</span>
                            <span>#productivity</span>
                        </div>
                        <div class="flex gap-6">
                            <span><i class="fa-regular fa-thumbs-up pr-3"></i><span class="text-b-mute">{{ lang.get('words.Likes') }}></span></span>
                            <span><i class="fa-regular fa-comment pr-3"></i><span class="text-b-mute">{{ lang.get('words.Comments') }}</span></span>
                            <span><i class="fa-regular fa-star pr-3"></i><span class="text-b-mute">{{ lang.get('words.Favorites') }}</span></span>
                        </div>
                    </div>
                </div>
                <div v-show="postCategory == POST_CATEGORY.top" class="tab-pane fade" id="top" role="tabpanel" aria-labelledby="latest-tab">
                    Tab 3 content
                </div>
            </div>
        </div>
        <div class="categories">
            <div class="grid grid-cols-1 gap-6">
                <h4 class="font-bold text-b-mute">{{ lang.get('words.Categories') }}</h4>
                <ul class="category-list ml-2">
                    <li v-for="(category, index) in CATEGORIES" :key="index">
                        <router-link :to="'#'" class="text-b-link underline">
                            {{ category.type }}
                        </router-link>
                    </li>
                </ul>
            </div>
        </div>
        <div v-show="!isLoggedIn" class="app">
            <div class="bg-white p-6 rounded-lg text-black">
                <div>
                    <h3 class="font-bold">{{ lang.get('words.MobileApplication') }}</h3>
                    <h3 class="font-bold">{{ lang.get('words.LandingPage') }}</h3>
                </div>
                <div class="mt-6">
                    <p class="text-small">{{ lang.get('words.MobileAdDescription') }}</p>
                </div>
                <div class="mt-6 flex gap-2">
                    <button class="flex px-2 py-1 gap-2 items-center bg-black text-white">
                        <span><i class="fa-brands fa-apple text-[2rem]"></i></span>
                        <span class="text-[10px]">
                            <span>{{ lang.get('words.DownloadOnThe') }}<br/>
                                <span class="font-bold"> App Store</span>
                            </span>
                        </span>
                    </button>
                    <button class="flex px-2 py-1 gap-2 items-center bg-black text-white">
                        <span><i class="fa-brands fa-google-play text-[2rem]"></i></span>
                        <span class="text-[10px]">
                            <span>{{ lang.get('words.GetItOn') }}<br/>
                                <span class="font-bold"> Google Store</span>
                            </span>
                        </span>
                    </button>
                </div>
            </div>
        </div>
        <div class="popular">
            <div class="grid grid-cols-1 gap-6">
                <h4 class="font-bold text-b-mute">{{ lang.get('words.PopularTags') }}</h4>
                <ul class="popular-list ml-2">
                    <li v-for="(category, index) in POPULAR_TAGS" :key="index">
                        <span class="underline">
                            #{{ category.type }}
                        </span>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
import { getters, mutations, actions } from "../../store";

export default {
    data() {
        return {
            postCategory: 1, // default relevant
            posts: [
                {
                    'title': '16 Libraries You Should Know as a React Developer. See my post now and read',
                    categories: [
                        '#webdev',
                        '#coding',
                        '#react',
                        '#productivity'
                    ],
                    user: {
                        name: 'Fel Reind Entica',
                        job: 'Software Engineer'
                    }
                },
                {
                    'title': '16 Libraries You Should Know as a React Developer. See my post now and read.16 Libraries You Should Know as a React Developer. See my post now and read16 Libraries You Should Know as a React Developer. See my post now and read',
                    categories: [
                        '#webdev',
                        '#coding',
                        '#react',
                        '#productivity'
                    ],
                    user: {
                        name: 'Fel Reind Entica',
                        job: 'Software Engineer'
                    }
                },
                {
                    'title': '16 Libraries You Should Know as a React Developer. See my post now and read',
                    categories: [
                        '#webdev',
                        '#coding',
                        '#react',
                        '#productivity'
                    ],
                    user: {
                        name: 'Fel Reind Entica',
                        job: 'Software Engineer'
                    }
                },
            ]
        };
    },
    created() {
        this.POST_CATEGORY = {
            relevant: 1, latest: 2, top: 3
        }
        this.CATEGORIES = [
            { type: 'Web Development' },
            { type: 'Mobile Development' },
            { type: 'REACT Dev' },
            { type: 'Vuejs' },
            { type: 'Javascript' },
            { type: 'Magento' },
            { type: 'WordPress' },
            { type: 'UI/UX Design' },
            { type: 'HTML/CSS' },
            { type: 'Angular' },
            { type: 'PHP Laravel' },
            { type: 'Quality Testing' },
            { type: 'Quality Testing' },
            { type: 'Quality Testing' },
            { type: 'Quality Testing' },
            { type: 'Quality Testing' },
            { type: 'Quality Testing' },
            { type: 'Quality Testing' },
            { type: 'Quality Testing' }
        ]

        this.POPULAR_TAGS = [
            { type: 'javascript' },
            { type: 'react' },
            { type: 'vuejs' },
            { type: 'webdev' },
            { type: 'software developer' },
            { type: 'mobilecoding' },
            { type: 'chronostep' },
            { type: 'beginner' },
            { type: 'programming' },
            { type: 'devops' },
            { type: 'cheatsheet' },
            { type: 'gwapoka?' }
        ]
    },
    methods: {
        ...mutations,...actions,
        setTab(val) {
            this.postCategory = val
        },
        signOut() {
            localStorage['chronoknowledge.jwt'] = null
            localStorage['chronoknowledge.user'] = null
            mutations.setUser(null)
            mutations.setIsLoggedIn(false)
        }
    },
    computed: {
        ...getters,
        landingLoggedInStyle() {
            return {
                'grid-template-areas': `'listing posts posts categories''listing posts posts popular'`,
                'background-color': 'none',
                'padding': '0'
            }
        }
    }
};
</script>

<style lang="scss" scoped>
@import "../../../sass/imports";

.landing-loggedIn {
    grid-template-areas:
        "listing posts posts categories"
        "listing posts posts popular";
}
.landing {
    display: grid;
    grid-template-areas:
        "about posts posts categories"
        "app posts posts popular";
    grid-template-rows: 1fr 1fr;
    grid-template-columns: 1fr 2fr 1fr;
    grid-gap: $base-comp-gap-y;
    margin: $base-comp-gap-y $base-comp-gap-x;
    // height: 100vh;

    .about {
        grid-area: about;
        display: grid;
        grid-row-gap: $base-gap;
        padding: $base-gap;
        background-color: $brand-theme-color-secondary;
        border-radius: $ui-default-border-radius;
        // max-width: 400px;
        max-height: 50vh;
    }

    .listing {
        grid-area: listing;
        display: grid;
        grid-row-gap: $base-gap;
        // padding: $base-gap;
        // background-color: $brand-theme-color-secondary;
        border-radius: $ui-default-border-radius;
        width: 300px;;
    }

    .posts {
        grid-area: posts;
        display: flex;
        flex-direction: column;
        grid-gap: $base-gap;

        #relevant::-webkit-scrollbar {
            display: none;
        }

        #relevant:hover::-webkit-scrollbar {
            display: block;
        }
    }
    .categories {
        grid-area: categories;
        max-height: 50vh;
        width: 300px;

        .category-list {
            overflow-y: scroll;
            max-height: calc(40vh - 50px);
        }
    }
    .app {
        grid-area: app;
        display: grid;
        grid-row-gap: $base-gap;
        background-color: $brand-theme-color-secondary;
        border-radius: $ui-default-border-radius;
        // max-width: 400px;
        max-height: 40vh;
    }
    .popular {
        grid-area: popular;
        max-height: 50vh;
        width: 300px;

        .popular-list {
            overflow-y: scroll;
            max-height: calc(40vh - 50px);
        }
    }
}


@media screen and (max-width: 1200px) {
    .landing {
        display: grid;
        grid-template-areas:
            "about posts posts categories"
            "app posts posts popular";
        grid-template-rows: 1fr 1fr;
        grid-template-columns: 1fr 2fr 1fr;
        grid-gap: $base-comp-gap-y;
        margin: $base-comp-gap-y $base-comp-gap-x;
        // height: 100vh;
    }
}

</style>
