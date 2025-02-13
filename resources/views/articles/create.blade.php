<x-app-layout>
    <x-slot name="header">
        <div class="flex justify-between">
            <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                Articles / Create
            </h2>
            <a href="{{ route('articles.list') }}" class="bg-slate-700 text-sm rounded-md text-white px-5 py-2">Back</a>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    @if ($errors->any())
                        <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative my-3"
                            role="alert">
                            <strong class="font-bold">Terjadi kesalahan!</strong>
                            <ul class="mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>- {{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-2 gap-6">
                            <div>
                                <label for="title" class="text-lg font-medium">Judul</label>
                                <input value="{{ old('title') }}" name="title" placeholder="Masukkan Judul Artikel"
                                    type="text" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            </div>

                            <div>
                                <label for="author" class="text-lg font-medium">Penulis</label>
                                <input value="{{ old('author') }}" name="author" placeholder="Masukkan Nama Penulis"
                                    type="text" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            </div>

                            <div>
                                <label for="caption_image" class="text-lg font-medium">Caption Gambar</label>
                                <input value="{{ old('fotografer') }}" name="fotografer"
                                    placeholder="Masukkan Nama Fotografer" type="text"
                                    class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                            </div>
                            <div>
                                <label for="tags" class="text-lg font-medium">Tags/Kata Kunci</label>
                                <input id="tags" name="tags" placeholder="Tags" type="text"
                                    class="border-gray-300 shadow-sm w-full rounded-lg advance-options"
                                    value="{{ old('tags') }}">
                            </div>
                            <div>
                                <label for="tgl_publish" class="text-lg font-medium">Tanggal Publish</label>
                                <input value="{{ old('tgl_publish') }}" name="tgl_publish" placeholder="Tanggal Publish"
                                    type="date" class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                                {{-- @error('tgl_publish')
                                    <p class="text-red-400 font-medium">{{ $message }}</p>
                                @enderror --}}
                            </div>
                            <div>
                                <label for="status_articles" class="text-lg font-medium">Status Publish</label>
                                <select name="status_articles" id="status_articles"
                                    class="border-gray-300 shadow-sm w-full rounded-lg p-2">
                                    <option value="">Pilih Status</option>
                                    <option value="publish" {{ old('status_articles') == 'publish' ? 'selected' : '' }}>
                                        Publish</option>
                                    <option value="draft" {{ old('status_articles') == 'draft' ? 'selected' : '' }}>
                                        Draft</option>
                                    <option value="validasi"
                                        {{ old('status_articles') == 'validasi' ? 'selected' : '' }}>
                                        perlu validasi</option>
                                </select>
                            </div>

                            <div class="col-span-2">
                                <label for="text" class="text-lg font-medium">Isi Konten</label>
                                <textarea name="text" placeholder="Masukkan Deskripsi Artikel" id="text-editor"
                                    class="border-gray-300 shadow-sm w-full rounded-lg p-2">{{ old('text') }}</textarea>
                            </div>

                            <div class="col-span-2 relative">
                                <label for="summary" class="text-lg font-medium">Ringkasan/Summary</label>
                                <div class="relative">
                                    <textarea name="summary" id="summary" placeholder="Masukkan Summary Artikel"
                                        class="border-gray-300 shadow-sm w-full rounded-lg p-2 resize-y min-h-[100px]" maxlength="250"
                                        oninput="updateCounter('summary', 'summaryCounter', 250)">{{ old('summary') }}</textarea>
                                    <span id="summaryCounter"
                                        class="absolute bottom-2 right-3 text-gray-400 text-sm bg-white px-1">0/250</span>
                                </div>
                            </div>

                            <div class="col-span-2 relative">
                                <label for="caption" class="text-lg font-medium">Caption</label>
                                <div class="relative">
                                    <textarea name="caption" id="caption" placeholder="Masukkan Caption Artikel"
                                        class="border-gray-300 shadow-sm w-full rounded-lg p-2 resize-y min-h-[100px]" maxlength="200"
                                        oninput="updateCounter('caption', 'captionCounter', 200)">{{ old('caption') }}</textarea>
                                    <span id="captionCounter"
                                        class="absolute bottom-2 right-3 text-gray-400 text-sm bg-white px-1">0/200</span>
                                </div>
                            </div>


                            <div>
                                <label for="file" class="text-lg font-medium">Upload Image</label>
                                <input type="file" name="file[]" id="file"
                                    class="border-gray-300 shadow-sm w-full rounded-lg p-2" multiple>
                                {{-- <img id="imagePreview" class="hidden w-40 h-40 object-cover rounded-md shadow-md mt-3"> --}}
                            </div>

                            <div id="preview" class="mt-4">
                                <!-- Preview gambar akan ditampilkan di sini -->
                            </div>
                        </div>
                        <div class="mt-6 text-right">
                            <button class="bg-slate-700 text-sm rounded-md text-white px-5 py-3">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    function updateStatusColor() {
        const selectElement = document.getElementById('status_articles');
        const selectedValue = selectElement.value;
        const selectClass = selectElement.classList;

        // Hapus kelas warna sebelumnya
        selectClass.remove('bg-green-300', 'bg-yellow-300', 'bg-red-300');

        // Tambahkan kelas warna baru berdasarkan nilai yang dipilih
        if (selectedValue === 'publish') {
            selectClass.add('bg-green-300');
        } else if (selectedValue === 'validasi') {
            selectClass.add('bg-red-300');
        } else if (selectedValue === 'draft') {
            selectClass.add('bg-yellow-300');
        }
    }

    // Inisialisasi warna saat halaman dimuat
    document.addEventListener('DOMContentLoaded', function() {
        updateStatusColor();
    });

    // Perbarui warna saat pilihan berubah
    document.getElementById('status_articles').addEventListener('change', updateStatusColor);

    document.getElementById('file').addEventListener('change', function(event) {
        const files = event.target.files;
        const previewContainer = document.getElementById('preview');
        previewContainer.innerHTML = ''; // Bersihkan preview sebelumnya

        for (let i = 0; i < files.length; i++) {
            const file = files[i];
            if (file.type.startsWith('image/')) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = document.createElement('img');
                    img.src = e.target.result;
                    img.classList.add('w-full', 'h-auto', 'block', 'mx-auto', 'mt-2');
                    previewContainer.appendChild(img);
                };
                reader.readAsDataURL(file);
            }
        }
    });


    // var input = document.querySelector('input.advance-options'),
    //     tagify = new Tagify(input, {
    //         pattern: /^.{0,20}$/, // Validate typed tag(s) by Regex. Here maximum chars length is defined as "20"
    //         delimiters: ",| ", // add new tags when a comma or a space character is entered
    //         trim: false, // if "delimiters" setting is using space as a delimeter, then "trim" should be set to "false"
    //         keepInvalidTags: true, // do not remove invalid tags (but keep them marked as invalid)
    //         // createInvalidTags: false,
    //         editTags: {
    //             clicks: 2, // single click to edit a tag
    //             keepInvalid: false // if after editing, tag is invalid, auto-revert
    //         },
    //         maxTags: 6,
    //         blacklist: ["foo", "bar", "baz"],
    //         whitelist: ["temple", "stun", "detective", "sign", "passion", "routine", "deck", "discriminate",
    //             "relaxation", "fraud", "attractive", "soft", "forecast", "point", "thank", "stage", "eliminate",
    //             "effective", "flood", "passive", "skilled", "separation", "contact", "compromise", "reality",
    //             "district", "nationalist", "leg", "porter", "conviction", "worker", "vegetable", "commerce",
    //             "conception", "particle", "honor", "stick", "tail", "pumpkin", "core", "mouse", "egg",
    //             "population", "unique", "behavior", "onion", "disaster", "cute", "pipe", "sock", "dialect",
    //             "horse", "swear", "owner", "cope", "global", "improvement", "artist", "shed", "constant",
    //             "bond", "brink", "shower", "spot", "inject", "bowel", "homosexual", "trust", "exclude", "tough",
    //             "sickness", "prevalence", "sister", "resolution", "cattle", "cultural", "innocent", "burial",
    //             "bundle", "thaw", "respectable", "thirsty", "exposure", "team", "creed", "facade", "calendar",
    //             "filter", "utter", "dominate", "predator", "discover", "theorist", "hospitality", "damage",
    //             "woman", "rub", "crop", "unpleasant", "halt", "inch", "birthday", "lack", "throne", "maximum",
    //             "pause", "digress", "fossil", "policy", "instrument", "trunk", "frame", "measure", "hall",
    //             "support", "convenience", "house", "partnership", "inspector", "looting", "ranch", "asset",
    //             "rally", "explicit", "leak", "monarch", "ethics", "applied", "aviation", "dentist", "great",
    //             "ethnic", "sodium", "truth", "constellation", "lease", "guide", "break", "conclusion", "button",
    //             "recording", "horizon", "council", "paradox", "bride", "weigh", "like", "noble", "transition",
    //             "accumulation", "arrow", "stitch", "academy", "glimpse", "case", "researcher", "constitutional",
    //             "notion", "bathroom", "revolutionary", "soldier", "vehicle", "betray", "gear", "pan", "quarter",
    //             "embarrassment", "golf", "shark", "constitution", "club", "college", "duty", "eaux", "know",
    //             "collection", "burst", "fun", "animal", "expectation", "persist", "insure", "tick", "account",
    //             "initiative", "tourist", "member", "example", "plant", "river", "ratio", "view", "coast",
    //             "latest", "invite", "help", "falsify", "allocation", "degree", "feel", "resort", "means",
    //             "excuse", "injury", "pupil", "shaft", "allow", "ton", "tube", "dress", "speaker", "double",
    //             "theater", "opposed", "holiday", "screw", "cutting", "picture", "laborer", "conservation",
    //             "kneel", "miracle", "brand", "nomination", "characteristic", "referral", "carbon", "valley",
    //             "hot", "climb", "wrestle", "motorist", "update", "loot", "mosquito", "delivery", "eagle",
    //             "guideline", "hurt", "feedback", "finish", "traffic", "competence", "serve", "archive",
    //             "feeling", "hope", "seal", "ear", "oven", "vote", "ballot", "study", "negative", "declaration",
    //             "particular", "pattern", "suburb", "intervention", "brake", "frequency", "drink", "affair",
    //             "contemporary", "prince", "dry", "mole", "lazy", "undermine", "radio", "legislation",
    //             "circumstance", "bear", "left", "pony", "industry", "mastermind", "criticism", "sheep",
    //             "failure", "chain", "depressed", "launch", "script", "green", "weave", "please", "surprise",
    //             "doctor", "revive", "banquet", "belong", "correction", "door", "image", "integrity",
    //             "intermediate", "sense", "formal", "cane", "gloom", "toast", "pension", "exception", "prey",
    //             "random", "nose", "predict", "needle", "satisfaction", "establish", "fit", "vigorous",
    //             "urgency", "X-ray", "equinox", "variety", "proclaim", "conceive", "bulb", "vegetarian",
    //             "available", "stake", "publicity", "strikebreaker", "portrait", "sink", "frog", "ruin",
    //             "studio", "match", "electron", "captain", "channel", "navy", "set", "recommend", "appoint",
    //             "liberal", "missile", "sample", "result", "poor", "efflux", "glance", "timetable", "advertise",
    //             "personality", "aunt", "dog"
    //         ],
    //         transformTag: transformTag,
    //         backspace: "edit",
    //         placeholder: "Type something",
    //         dropdown: {
    //             enabled: 1, // show suggestion after 1 typed character
    //             fuzzySearch: false, // match only suggestions that starts with the typed characters
    //             position: 'text', // position suggestions list next to typed text
    //             caseSensitive: true, // allow adding duplicate items if their case is different
    //         },
    //         templates: {
    //             dropdownItemNoMatch: function(data) {
    //                 return `No suggestion found for: ${data.value}`
    //             }
    //         }
    //     })

    // tagify.on('change', updatePlaceholderByTagsCount);

    // function updatePlaceholderByTagsCount() {
    //     tagify.setPlaceholder(`${tagify.value.length || 'no'} tags added`)
    // }

    // updatePlaceholderByTagsCount()

    // // generate a random color (in HSL format, which I like to use)
    // function getRandomColor() {
    //     function rand(min, max) {
    //         return min + Math.random() * (max - min);
    //     }

    //     var h = rand(1, 360) | 0,
    //         s = rand(40, 70) | 0,
    //         l = rand(65, 72) | 0;

    //     return 'hsl(' + h + ',' + s + '%,' + l + '%)';
    // }

    // function transformTag(tagData) {
    //     tagData.color = getRandomColor();
    //     tagData.style = "--tag-bg:" + tagData.color;

    //     if (tagData.value.toLowerCase() == 'shit')
    //         tagData.value = 's✲✲t'
    // }

    // tagify.on('add', function(e) {
    //     console.log(e.detail)
    // })

    // tagify.on('invalid', function(e) {
    //     console.log(e, e.detail);
    // })

    // var clickDebounce;

    // tagify.on('click', function(e) {
    //     const {
    //         tag: tagElm,
    //         data: tagData
    //     } = e.detail;

    //     // a delay is needed to distinguish between regular click and double-click.
    //     // this allows enough time for a possible double-click, and noly fires if such
    //     // did not occur.
    //     clearTimeout(clickDebounce);
    //     clickDebounce = setTimeout(() => {
    //         tagData.color = getRandomColor();
    //         tagData.style = "--tag-bg:" + tagData.color;
    //         tagify.replaceTag(tagElm, tagData);
    //     }, 200);
    // })

    // tagify.on('dblclick', function(e) {
    //     // when souble clicking, do not change the color of the tag
    //     clearTimeout(clickDebounce);
    // })
</script>
