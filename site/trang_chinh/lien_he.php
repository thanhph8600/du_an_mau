<section>
    <div class="container m-auto">
        <!-- component -->
        <form class=" w-3/5  m-auto py-8">
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
                        Họ tên
                    </label>
                    <input name="name" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" id="grid-first-name" type="text">
                    <!-- <p class="text-red-500 text-xs italic">Please fill out this field.</p> -->
                </div>
                <div class="w-full md:w-1/2 px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
                        Số điện thoại
                    </label>
                    <input name="phone" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-last-name" type="number">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        E-mail
                    </label>
                    <input name="email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="email" type="email">
                </div>
            </div>
            <div class="flex flex-wrap -mx-3 mb-6">
                <div class="w-full px-3">
                    <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
                        Message
                    </label>
                    <textarea name="mess" class=" no-resize appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500 h-48 resize-none" id="message"></textarea>

                </div>
            </div>
            <div class="md:flex md:items-center">
                <div class="md:w-1/3">
                    <input type="submit" value="Gửi" class="shadow bg-blue-400 hover:bg-blue-500 focus:shadow-outline focus:outline-none text-white font-bold py-2 px-4 rounded" >

                </div>
                <div class="md:w-2/3"></div>
            </div>
        </form>
    </div>
</section>
<script>
    $(function() {
        $("form").validate({
            rules: {
                name: {
                    required: true,
                },
                phone: {
                    required: true,
                    minlength: 10,
                    maxlength: 10,
                },
                email: {
                    required: true,
                    email: true
                },
                mess: {
                    required: true,
                }
            },
            messages: {
                name: {
                    required: '< p class = "text-red-500 text-xs italic" > Bạn chưa điền tên < /p>',
                },
                phone: {
                    required: '< p class = "text-red-500 text-xs italic" > Bạn chưa điền số điện thoại < /p>',
                    minlength: '< p class = "text-red-500 text-xs italic" > phải đúng số điện thoại < /p>',
                    maxlength: '< p class = "text-red-500 text-xs italic" > phải đúng số điện thoại < /p>',
                },
                email: {
                    required: '< p class = "text-red-500 text-xs italic" > Bạn chưa điền email < /p>',
                    email: '< p class = "text-red-500 text-xs italic" > Bạn chưa điền đúng định dạng email < /p>',
                },
                mess: {
                    required: '< p class = "text-red-500 text-xs italic" > Bạn chưa điền tin nhắn < /p>',
                }
            },
        });
    });
</script>