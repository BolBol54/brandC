<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <script src="https://unpkg.com/vue@3"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bulma@0.9.4/css/bulma.min.css">
    @vite(['resources/js/app.js','resources/css/app.css'])

    <style>
        body {
            padding: 10px;
        }
    </style>
</head>

<body>
    <div id="app">

        {{-- <div class="container">
            <form method="POST" action="/categories" @submit.prevent="onSubmit">
                <div class="control">
                    <label class="label"> Category Name</label>
                    <input type="text" class="form-control" name="name" id="name" v-model="name">
                    <span class="help is-danger" v-text="errors.get('name')"></span>
                </div>

                <div class="control">
                    <label class="label"> Category Description</label>
                    <input type="text" class="form-control" name="description" id="description" v-model="description">
                </div>
                <div class="control">
                    <button class="button is-primary">Create</button>
                </div>
            </form>
        </div> --}}
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue@2.6"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios@1.5.0/dist/axios.min.js"></script>


    <script src="./js/app.js"></script>

</body>

<script></script>

</html>
