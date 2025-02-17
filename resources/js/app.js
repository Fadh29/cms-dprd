import './bootstrap';
import Tagify from '@yaireo/tagify';
import '@yaireo/tagify/dist/tagify.css';
import Alpine from 'alpinejs';

window.Alpine = Alpine;

Alpine.start();


document.addEventListener('DOMContentLoaded', function () {
    // Element references
    const hamburger = document.getElementById('hamburger');
    const sidebar = document.getElementById('sidebar');
    const closeSidebar = document.getElementById('closeSidebar');
    const submenuToggles = document.querySelectorAll('.submenu-toggle');

    // Breakpoint for mobile view
    const mobileBreakpoint = 768; // Adjust based on your CSS breakpoint

    // Toggle sidebar visibility
    if (hamburger && sidebar) {
        hamburger.addEventListener('click', function () {
            sidebar.classList.toggle('-translate-x-full');
        });
    }

    if (closeSidebar && sidebar) {
        closeSidebar.addEventListener('click', function () {
            sidebar.classList.add('-translate-x-full');
        });
    }

    // Submenu toggle functionality
    if (submenuToggles) {
        submenuToggles.forEach((toggle) => {
            toggle.addEventListener('click', function () {
                const submenu = this.nextElementSibling; // Get the next sibling element (submenu)
                if (submenu) {
                    submenu.classList.toggle('hidden'); // Toggle the "hidden" class
                    const icon = this.querySelector('.submenu-icon'); // Find the submenu icon
                    if (icon) {
                        // Change icon based on submenu visibility
                        icon.textContent = submenu.classList.contains('hidden') ? '▼' : '▲';
                    }
                }
            });
        });
    }

    window.addEventListener('resize', function () {
        if (window.innerWidth >= mobileBreakpoint || window.innerWidth < mobileBreakpoint) {
            sidebar.classList.add('-translate-x-full');
        }
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var input = document.querySelector('input.advance-options'),
        tagify = new Tagify(input, {
            pattern: /^.{0,20}$/,  // Validate typed tag(s) by Regex. Here maximum chars length is defined as "20"
            delimiters: ",| ",    // add new tags when a comma or a space character is entered
            trim: false,          // if "delimiters" setting is using space as a delimeter, then "trim" should be set to "false"
            keepInvalidTags: false, // do not remove invalid tags (but keep them marked as invalid)
            editTags: {
                clicks: 2,              // single click to edit a tag
                keepInvalid: false      // if after editing, tag is invalid, auto-revert
            },
            maxTags: 20,
            blacklist: ["foo", "bar", "baz"],
            whitelist: ["temple", "stun", "detective", "sign", "passion", "routine", "deck", "discriminate", "relaxation", "fraud", "attractive", "soft", "forecast", "point", "thank", "stage", "eliminate", "effective", "flood", "passive", "skilled", "separation", "contact", "compromise", "reality", "district", "nationalist", "leg", "porter", "conviction", "worker", "vegetable", "commerce", "conception", "particle", "honor", "stick", "tail", "pumpkin", "core", "mouse", "egg", "population", "unique", "behavior", "onion", "disaster", "cute", "pipe", "sock", "dialect", "horse", "swear", "owner", "cope", "global", "improvement", "artist", "shed", "constant", "bond", "brink", "shower", "spot", "inject", "bowel", "homosexual", "trust", "exclude", "tough", "sickness", "prevalence", "sister", "resolution", "cattle", "cultural", "innocent", "burial", "bundle", "thaw", "respectable", "thirsty", "exposure", "team", "creed", "facade", "calendar", "filter", "utter", "dominate", "predator", "discover", "theorist", "hospitality", "damage", "woman", "rub", "crop", "unpleasant", "halt", "inch", "birthday", "lack", "throne", "maximum", "pause", "digress", "fossil", "policy", "instrument", "trunk", "frame", "measure", "hall", "support", "convenience", "house", "partnership", "inspector", "looting", "ranch", "asset", "rally", "explicit", "leak", "monarch", "ethics", "applied", "aviation", "dentist", "great", "ethnic", "sodium", "truth", "constellation", "lease", "guide", "break", "conclusion", "button", "recording", "horizon", "council", "paradox", "bride", "weigh", "like", "noble", "transition", "accumulation", "arrow", "stitch", "academy", "glimpse", "case", "researcher", "constitutional", "notion", "bathroom", "revolutionary", "soldier", "vehicle", "betray", "gear", "pan", "quarter", "embarrassment", "golf", "shark", "constitution", "club", "college", "duty", "eaux", "know", "collection", "burst", "fun", "animal", "expectation", "persist", "insure", "tick", "account", "initiative", "tourist", "member", "example", "plant", "river", "ratio", "view", "coast", "latest", "invite", "help", "falsify", "allocation", "degree", "feel", "resort", "means", "excuse", "injury", "pupil", "shaft", "allow", "ton", "tube", "dress", "speaker", "double", "theater", "opposed", "holiday", "screw", "cutting", "picture", "laborer", "conservation", "kneel", "miracle", "brand", "nomination", "characteristic", "referral", "carbon", "valley", "hot", "climb", "wrestle", "motorist", "update", "loot", "mosquito", "delivery", "eagle", "guideline", "hurt", "feedback", "finish", "traffic", "competence", "serve", "archive", "feeling", "hope", "seal", "ear", "oven", "vote", "ballot", "study", "negative", "declaration", "particular", "pattern", "suburb", "intervention", "brake", "frequency", "drink", "affair", "contemporary", "prince", "dry", "mole", "lazy", "undermine", "radio", "legislation", "circumstance", "bear", "left", "pony", "industry", "mastermind", "criticism", "sheep", "failure", "chain", "depressed", "launch", "script", "green", "weave", "please", "surprise", "doctor", "revive", "banquet", "belong", "correction", "door", "image", "integrity", "intermediate", "sense", "formal", "cane", "gloom", "toast", "pension", "exception", "prey", "random", "nose", "predict", "needle", "satisfaction", "establish", "fit", "vigorous", "urgency", "X-ray", "equinox", "variety", "proclaim", "conceive", "bulb", "vegetarian", "available", "stake", "publicity", "strikebreaker", "portrait", "sink", "frog", "ruin", "studio", "match", "electron", "captain", "channel", "navy", "set", "recommend", "appoint", "liberal", "missile", "sample", "result", "poor", "efflux", "glance", "timetable", "advertise", "personality", "aunt", "dog"],
            transformTag: transformTag,
            backspace: "edit",
            placeholder: "Type something",
            dropdown: {
                enabled: 1,            // show suggestion after 1 typed character
                fuzzySearch: false,    // match only suggestions that starts with the typed characters
                position: 'text',      // position suggestions list next to typed text
                caseSensitive: true,   // allow adding duplicate items if their case is different
            },
            templates: {
                dropdownItemNoMatch: function(data) {
                    return `No suggestion found for: ${data.value}`
                }
            }
        });

    tagify.on('change', updatePlaceholderByTagsCount);

    function updatePlaceholderByTagsCount() {
        tagify.setPlaceholder(`${tagify.value.length || 'no'} tags added`)
    }

    updatePlaceholderByTagsCount()

    // generate a random color (in HSL format, which I like to use)
    function getRandomColor(){
        function rand(min, max) {
            return min + Math.random() * (max - min);
        }

        var h = rand(1, 360)|0,
            s = rand(40, 70)|0,
            l = rand(65, 72)|0;

        return 'hsl(' + h + ',' + s + '%,' + l + '%)';
    }

    function transformTag( tagData ){
        tagData.color = "#D3D3D3"; // Light Gray

        tagData.style = "--tag-bg:" + tagData.color;

        if( tagData.value.toLowerCase() == 'shit' )
            tagData.value = 's✲✲t'
    }

    tagify.on('add', function(e){
        const newTag = e.detail.tag;
        const existingTag = tagify.value.find(tag => tag.value.toLowerCase() === newTag.value.toLowerCase());

        if (existingTag) {
            tagify.removeTag(existingTag);
            e.preventDefault(); // Prevent the new tag from being added
        } else {
            console.log(e.detail);
        }
    })

    tagify.on('invalid', function(e){
        console.log(e, e.detail);
    })

    var clickDebounce;

    tagify.on('click', function(e){
        const {tag:tagElm, data:tagData} = e.detail;

        // a delay is needed to distinguish between regular click and double-click.
        // this allows enough time for a possible double-click, and noly fires if such
        // did not occur.
        clearTimeout(clickDebounce);
        clickDebounce = setTimeout(() => {
            tagData.color = "#D3D3D3"; // Light Gray

            tagData.style = "--tag-bg:" + tagData.color;
            tagify.replaceTag(tagElm, tagData);
        }, 200);
    })

    tagify.on('dblclick', function(e){
        // when souble clicking, do not change the color of the tag
        clearTimeout(clickDebounce);
    })
});


window.addEventListener("scroll", function() {
    let header = document.getElementById("header");
    let logo = document.getElementById("logo");
    let title = document.getElementById("header-title");

    if (window.scrollY > 50) {
      header.classList.add("py-2");
      header.classList.remove("py-4");

      logo.classList.add("w-12");
      logo.classList.remove("w-20");

      title.classList.add("text-lg");
      title.classList.remove("text-2xl");
    } else {
      header.classList.add("py-4");
      header.classList.remove("py-2");

      logo.classList.add("w-20");
      logo.classList.remove("w-12");

      title.classList.add("text-2xl");
      title.classList.remove("text-lg");
    }
  });


// JavaScript to handle the automatic slider change every 2 seconds
let currentSlide = 0;
const slides = document.querySelectorAll('.slider-items img');
const totalSlides = slides.length;

const sliderItems = document.querySelector('.slider-items');
const nextBtn = document.getElementById('next');
const prevBtn = document.getElementById('prev');

// Function to change the slide
function changeSlide() {
  currentSlide = (currentSlide + 1) % totalSlides;
  sliderItems.style.transform = `translateX(-${currentSlide * 100}%)`;
}

// Automatic slide transition every 2 seconds
setInterval(changeSlide, 2000);

// Next and Prev buttons functionality
nextBtn.addEventListener('click', () => {
  currentSlide = (currentSlide + 1) % totalSlides;
  sliderItems.style.transform = `translateX(-${currentSlide * 100}%)`;
});

prevBtn.addEventListener('click', () => {
  currentSlide = (currentSlide - 1 + totalSlides) % totalSlides;
  sliderItems.style.transform = `translateX(-${currentSlide * 100}%)`;
});

const readMoreBtn = document.getElementById('readMoreBtn');
const description = document.querySelector('.text-gray-700');

readMoreBtn.addEventListener('click', () => {
  // Toggle deskripsi untuk menampilkan seluruh teks
  description.classList.toggle('line-clamp-none');
  if (description.classList.contains('line-clamp-none')) {
    readMoreBtn.textContent = 'Baca Lebih Sedikit';
  } else {
    readMoreBtn.textContent = 'Baca Selengkapnya';
  }
});

$(document).ready(function() {
    // Inisialisasi Summernote
    $('#summernote').summernote({
        height: 300,
        placeholder: 'Masukkan deskripsi tupoksi...',
        toolbar: [
            ['style', ['bold', 'italic', 'underline', 'clear']],
            ['font', ['strikethrough', 'superscript', 'subscript']],
            ['fontsize', ['fontsize']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['height', ['height']],
            ['insert', ['link', 'picture', 'video']],
            ['view', ['fullscreen', 'codeview', 'help']]
        ],
        popover: {
            image: [
                ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                ['float', ['floatLeft', 'floatRight', 'floatNone']],
                ['remove', ['removeMedia']]
            ]
        }
    });

    // Update preview saat Summernote berubah
    $('#summernote').on('summernote.change', function(_, contents) {
        $('#preview').html(contents);
    });

    // Saat halaman dimuat, isi preview dengan teks lama
    let initialContent = $('#summernote').summernote('code');
    $('#preview').html(initialContent);
});
