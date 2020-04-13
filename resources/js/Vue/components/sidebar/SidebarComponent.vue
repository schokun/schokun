<template>
    <div class="d-flex">
        <div class="dashboardSidebar">
            <div class="dash-sidebar-header">
                <a href="#">
                    <h3>BLOG</h3>
                    <small>Админка</small>
                    <a href="/">Перейти на сайт</a>
                </a>
            </div>
            <div>
                <ul>
                    <li>
                        <router-link active-class="active" tag="a" :to="{ name: 'users'} ">Пользователи</router-link>
                    </li>
                    <li>
                        <router-link active-class="active" tag="a" :to="{ name: 'feedback'}">Обратная связь</router-link>
                    </li>
                    <li>
                        <router-link active-class="active" tag="a" :to="{ name: 'post'}">Посты</router-link>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        name: "SidebarComponent",
    }
</script>

<style>
.dashboardSidebar ul li .active{
    background: #fff;
    color: #7386d5!important;
}
</style>
