<template>
    <div style="background-color: #d3d3d3;">
        <div class="container" style="background-color: #d3d3d3;">
            <header class="d-flex flex-wrap align-items-center justify-content-center justify-content-md-between py-3 mb-4">
                <a class="d-flex align-items-center col-md-3 mb-2 mb-md-0 text-dark text-decoration-none"></a>

                <ul class="nav col-12 col-md-auto mb-2 justify-content-center mb-md-0">
                    <li>
                        <router-link to="/" active-class="border-b-2" class="nav-link px-2 link-dark">Home</router-link>
                    </li>
                    <li>
                        <router-link to="/orders" active-class="border-b-2"
                            class="nav-link px-2 link-dark">Orders</router-link>
                    </li>
                </ul>

                <div class="col-md-3 text-end"></div>
            </header>
        </div>
    </div>
    <div class="container">
        <router-view></router-view>
    </div>
</template>