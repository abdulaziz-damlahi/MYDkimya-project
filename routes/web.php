<?php

use App\Http\Controllers\Admin\AboutController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\BlogSectionController;
use App\Http\Controllers\Admin\BreadcrumbController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\Admin\CommentSectionController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\ContactSectionController;
use App\Http\Controllers\Admin\CounterController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ErrorPageController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FaqSectionController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\GalleryController;
use App\Http\Controllers\Admin\GoogleAnalyticController;
use App\Http\Controllers\Admin\LanguageController;
use App\Http\Controllers\Admin\LanguageKeywordController;
use App\Http\Controllers\Admin\MessageController;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\PriceController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\ProjectSectionController;
use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SeoController;
use App\Http\Controllers\Admin\ServiceSectionController;
use App\Http\Controllers\Admin\SiteImageController;
use App\Http\Controllers\Admin\SiteInfoController;
use App\Http\Controllers\Admin\SkillController;
use App\Http\Controllers\Admin\SkillSectionController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\SocialController;
use App\Http\Controllers\Admin\SponsorController;
use App\Http\Controllers\Admin\TeamController;
use App\Http\Controllers\Admin\TeamSectionController;
use App\Http\Controllers\Admin\TestimonialController;
use App\Http\Controllers\Admin\TestimonialSectionController;
use App\Http\Controllers\Frontend\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/




// Start Site Frontend Route
Route::get('/', [HomeController::class, 'index'])->name('homepage')->middleware('XSS');

Route::post('message', [App\Http\Controllers\Frontend\Landing\MessageController::class, 'store'])
    ->name('message.store')->middleware('XSS');

Route::middleware(['XSS'])->group(function () {
    Route::get('blogs', [\App\Http\Controllers\Frontend\BlogController::class, 'index'])->name('blog-page.index');
    Route::get('blog/{slug}', [App\Http\Controllers\Frontend\BlogController::class, 'show'])->name('blog-page.show');
    Route::get('blog/category/{category_name}', [App\Http\Controllers\Frontend\BlogController::class, 'category_show'])->name('blog-category.show');
    Route::post('blog/search', [App\Http\Controllers\Frontend\BlogController::class, 'search'])->name('blog-page.search');
});

Route::get('page/{page_slug}', [App\Http\Controllers\Frontend\PageController::class, 'show'])
    ->name('any-page.show')->middleware('XSS');

Route::get('gallery', [App\Http\Controllers\Frontend\GalleryController::class, 'index'])
    ->name('gallery-page.index')->middleware('XSS');

Route::post('comment', [App\Http\Controllers\Frontend\CommentController::class, 'store'])
    ->name('comment.store')->middleware('XSS');
// End Site Frontend Route

// Start Site Admin Route
Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('slider/create', [SliderController::class, 'create'])->name('slider.create');
    Route::post('slider', [SliderController::class, 'store'])->name('slider.store');
    Route::get('slider/{id}/edit', [SliderController::class, 'edit'])->name('slider.edit');
    Route::put('slider/{id}', [SliderController::class, 'update'])->name('slider.update');
    Route::delete('slider/{id}', [SliderController::class, 'destroy'])->name('slider.destroy');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('feature/create', [FeatureController::class, 'create'])->name('feature.create');
    Route::post('feature', [FeatureController::class, 'store'])->name('feature.store');
    Route::get('feature/{id}/edit', [FeatureController::class, 'edit'])->name('feature.edit');
    Route::put('feature/{id}', [FeatureController::class, 'update'])->name('feature.update');
    Route::delete('feature/{id}', [FeatureController::class, 'destroy'])->name('feature.destroy');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('about/create', [AboutController::class, 'create'])->name('about.create');
    Route::post('about', [AboutController::class, 'store'])->name('about.store');
    Route::put('about/{id}', [AboutController::class, 'update'])->name('about.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('counter/create', [CounterController::class, 'create'])->name('counter.create');
    Route::post('counter', [CounterController::class, 'store'])->name('counter.store');
    Route::get('counter/{id}/edit', [CounterController::class, 'edit'])->name('counter.edit');
    Route::put('counter/{id}', [CounterController::class, 'update'])->name('counter.update');
    Route::delete('counter/{id}', [CounterController::class, 'destroy'])->name('counter.destroy');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('service/create', [ServiceController::class, 'create'])->name('service.create');
    Route::post('service', [ServiceController::class, 'store'])->name('service.store');
    Route::get('service/{id}/edit', [ServiceController::class, 'edit'])->name('service.edit');
    Route::put('service/{id}', [ServiceController::class, 'update'])->name('service.update');
    Route::delete('service/{id}', [ServiceController::class, 'destroy'])->name('service.destroy');

    Route::post('service-section', [ServiceSectionController::class, 'store'])->name('service-section.store');
    Route::put('service-section/{id}', [ServiceSectionController::class, 'update'])->name('service-section.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('team/create', [TeamController::class, 'create'])->name('team.create');
    Route::post('team', [TeamController::class, 'store'])->name('team.store');
    Route::get('team/{id}/edit', [TeamController::class, 'edit'])->name('team.edit');
    Route::put('team/{id}', [TeamController::class, 'update'])->name('team.update');
    Route::delete('team/{id}', [TeamController::class, 'destroy'])->name('team.destroy');

    Route::post('team-section', [TeamSectionController::class, 'store'])->name('team-section.store');
    Route::put('team-section/{id}', [TeamSectionController::class, 'update'])->name('team-section.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('skill/create', [SkillController::class, 'create'])->name('skill.create');
    Route::post('skill', [SkillController::class, 'store'])->name('skill.store');
    Route::get('skill/{id}/edit', [SkillController::class, 'edit'])->name('skill.edit');
    Route::put('skill/{id}', [SkillController::class, 'update'])->name('skill.update');
    Route::delete('skill/{id}', [SkillController::class, 'destroy'])->name('skill.destroy');

    Route::post('skill-section', [SkillSectionController::class, 'store'])->name('skill-section.store');
    Route::put('skill-section/{id}', [SkillSectionController::class, 'update'])->name('skill-section.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('project/create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('project', [ProjectController::class, 'store'])->name('project.store');
    Route::get('project/{id}/edit', [ProjectController::class, 'edit'])->name('project.edit');
    Route::put('project/{id}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('project/{id}', [ProjectController::class, 'destroy'])->name('project.destroy');

    Route::post('project-section', [ProjectSectionController::class, 'store'])->name('project-section.store');
    Route::put('project-section/{id}', [ProjectSectionController::class, 'update'])->name('project-section.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('sponsor/create', [SponsorController::class, 'create'])->name('sponsor.create');
    Route::post('sponsor', [SponsorController::class, 'store'])->name('sponsor.store');
    Route::get('sponsor/{id}/edit', [SponsorController::class, 'edit'])->name('sponsor.edit');
    Route::put('sponsor/{id}', [SponsorController::class, 'update'])->name('sponsor.update');
    Route::delete('sponsor/{id}', [SponsorController::class, 'destroy'])->name('sponsor.destroy');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('category/create', [CategoryController::class, 'create'])->name('blog-category.create');
    Route::post('category', [CategoryController::class, 'store'])->name('blog-category.store');
    Route::get('category/{id}/edit', [CategoryController::class, 'edit'])->name('blog-category.edit');
    Route::put('category/{id}', [CategoryController::class, 'update'])->name('blog-category.update');
    Route::delete('category/{id}', [CategoryController::class, 'destroy'])->name('blog-category.destroy');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('blog', [BlogController::class, 'index'])->name('blog.index');
    Route::get('blog/create', [BlogController::class, 'create'])->name('blog.create');
    Route::post('blog', [BlogController::class, 'store'])->name('blog.store');
    Route::get('blog/{id}/edit', [BlogController::class, 'edit'])->name('blog.edit');
    Route::put('blog/{id}', [BlogController::class, 'update'])->name('blog.update');
    Route::delete('blog/{id}', [BlogController::class, 'destroy'])->name('blog.destroy');

    Route::post('blog-section', [BlogSectionController::class, 'store'])->name('blog-section.store');
    Route::put('blog-section/{id}', [BlogSectionController::class, 'update'])->name('blog-section.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('testimonial/create', [TestimonialController::class, 'create'])->name('testimonial.create');
    Route::post('testimonial', [TestimonialController::class, 'store'])->name('testimonial.store');
    Route::get('testimonial/{id}/edit', [TestimonialController::class, 'edit'])->name('testimonial.edit');
    Route::put('testimonial/{id}', [TestimonialController::class, 'update'])->name('testimonial.update');
    Route::delete('testimonial/{id}', [TestimonialController::class, 'destroy'])->name('testimonial.destroy');

    Route::post('testimonial-section', [TestimonialSectionController::class, 'store'])->name('testimonial-section.store');
    Route::put('testimonial-section/{id}', [TestimonialSectionController::class, 'update'])->name('testimonial-section.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('gallery/create', [GalleryController::class, 'create'])->name('gallery.create');
    Route::post('gallery', [GalleryController::class, 'store'])->name('gallery.store');
    Route::get('gallery/{id}/edit', [GalleryController::class, 'edit'])->name('gallery.edit');
    Route::put('gallery/{id}', [GalleryController::class, 'update'])->name('gallery.update');
    Route::delete('gallery/{id}', [GalleryController::class, 'destroy'])->name('gallery.destroy');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('price/create', [PriceController::class, 'create'])->name('price.create');
    Route::post('price', [PriceController::class, 'store'])->name('price.store');
    Route::get('price/{id}/edit', [PriceController::class, 'edit'])->name('price.edit');
    Route::put('price/{id}', [PriceController::class, 'update'])->name('price.update');
    Route::delete('price/{id}', [PriceController::class, 'destroy'])->name('price.destroy');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('faq/create', [FaqController::class, 'create'])->name('faq.create');
    Route::post('faq', [FaqController::class, 'store'])->name('faq.store');
    Route::get('faq/{id}/edit', [FaqController::class, 'edit'])->name('faq.edit');
    Route::put('faq/{id}', [FaqController::class, 'update'])->name('faq.update');
    Route::delete('faq/{id}', [FaqController::class, 'destroy'])->name('faq.destroy');

    Route::post('faq-section', [FaqSectionController::class, 'store'])->name('faq-section.store');
    Route::put('faq-section/{id}', [FaqSectionController::class, 'update'])->name('faq-section.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('site-info/create', [SiteInfoController::class, 'create'])->name('site-info.create');
    Route::post('site-info', [SiteInfoController::class, 'store'])->name('site-info.store');
    Route::put('site-info/{id}', [SiteInfoController::class, 'update'])->name('site-info.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('site-image/create', [SiteImageController::class, 'create'])->name('site-image.create');
    Route::post('site-image', [SiteImageController::class, 'store'])->name('site-image.store');
    Route::put('site-image/{id}', [SiteImageController::class, 'update'])->name('site-image.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('google-analytic/create', [GoogleAnalyticController::class, 'create'])->name('google-analytic.create');
    Route::post('google-analytic', [GoogleAnalyticController::class, 'store'])->name('google-analytic.store');
    Route::put('google-analytic/{id}', [GoogleAnalyticController::class, 'update'])->name('google-analytic.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('breadcrumb/create', [BreadcrumbController::class, 'create'])->name('breadcrumb.create');
    Route::post('breadcrumb', [BreadcrumbController::class, 'store'])->name('breadcrumb.store');
    Route::put('breadcrumb/{id}', [BreadcrumbController::class, 'update'])->name('breadcrumb.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('section/create',  [SectionController::class, 'create'])->name('section.create');
    Route::patch('section/{id}',  [SectionController::class, 'update'])->name('section.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('seo/create', [SeoController::class, 'create'])->name('seo.create');
    Route::post('seo', [SeoController::class, 'store'])->name('seo.store');
    Route::put('seo/{id}', [SeoController::class, 'update'])->name('seo.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('color/create', [ColorController::class, 'create'])->name('color.create');
    Route::post('color', [ColorController::class, 'store'])->name('color.store');
    Route::put('color/{id}', [ColorController::class, 'update'])->name('color.update');
    Route::delete('color/{id}', [ColorController::class, 'destroy'])->name('color.destroy');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('contact/create', [ContactController::class, 'create'])->name('contact.create');
    Route::post('contact', [ContactController::class, 'store'])->name('contact.store');
    Route::get('contact/{id}/edit', [ContactController::class, 'edit'])->name('contact.edit');
    Route::put('contact/{id}', [ContactController::class, 'update'])->name('contact.update');
    Route::delete('contact/{id}', [ContactController::class, 'destroy'])->name('contact.destroy');

    Route::post('contact-section', [ContactSectionController::class, 'store'])->name('contact-section.store');
    Route::put('contact-section/{id}', [ContactSectionController::class, 'update'])->name('contact-section.update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('social/create', [SocialController::class, 'create'])->name('social.create');
    Route::post('social', [SocialController::class, 'store'])->name('social.store');
    Route::get('social/{id}/edit', [SocialController::class, 'edit'])->name('social.edit');
    Route::put('social/{id}', [SocialController::class, 'update'])->name('social.update');
    Route::patch('social/update_status/{id}', [SocialController::class, 'update_status'])->name('social.update_status');
    Route::delete('social/{id}', [SocialController::class, 'destroy'])->name('social.destroy');
});

Route::middleware(['auth:sanctum', 'verified'])->prefix('admin')->group(function () {
    Route::get('message', [MessageController::class, 'index'])->name('message.index');
    Route::put('message/{id}', [MessageController::class, 'update'])->name('message.update');
    Route::patch('message/mark_all', [MessageController::class, 'mark_all_read_update'])->name('message.mark_all_read_update');
    Route::delete('message/{id}', [MessageController::class, 'destroy'])->name('message.destroy');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('page', [PageController::class, 'index'])->name('page.index');
    Route::get('page/create', [PageController::class, 'create'])->name('page.create');
    Route::post('page', [PageController::class, 'store'])->name('page.store');
    Route::get('page/{id}/edit', [PageController::class, 'edit'])->name('page.edit');
    Route::put('page/{id}', [PageController::class, 'update'])->name('page.update');
    Route::delete('page/{id}', [PageController::class, 'destroy'])->name('page.destroy');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('comment', [CommentSectionController::class, 'index'])->name('comment-section.index');
    Route::put('comment/{id}', [CommentSectionController::class, 'update'])->name('comment-section.update');
    Route::patch('comment/mark_all', [CommentSectionController::class, 'mark_all_approval_update'])->name('comment-section.mark_all_approval_update');
    Route::delete('comment/{id}', [CommentSectionController::class, 'destroy'])->name('comment-section.destroy');
});
// End Landing Site Admin Route



Route::middleware(['auth:sanctum', 'verified', 'XSS'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile/{id}', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('profile/change-password', [ProfileController::class, 'change_password_edit'])->name('profile.change_password_edit');
    Route::put('profile/change-password/update', [ProfileController::class, 'change_password_update'])->name('profile.change_password_update');
});

Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('language/create', [LanguageController::class, 'create'])->name('language.create');
    Route::post('language', [LanguageController::class, 'store'])->name('language.store');
    Route::get('language/{id}/edit', [LanguageController::class, 'edit'])->name('language.edit');
    Route::patch('language/language-select', [LanguageController::class, 'update_language'])->name('language.update_language');
    Route::patch('language/processed-language', [LanguageController::class, 'update_processed_language'])->name('language.update_processed_language');
    Route::put('language/{id}', [LanguageController::class, 'update'])->name('language.update');
    Route::patch('language/update_display_dropdown/{id}', [LanguageController::class, 'update_display_dropdown'])->name('language.update_display_dropdown');
    Route::delete('language/{id}', [LanguageController::class, 'destroy'])->name('language.destroy');
});

Route::get('language/set-locale/{language_id}', [LanguageController::class, 'set_locale'])
    ->name('language.set_locale')->middleware('XSS');


Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {

    Route::get('language-keyword-for-adminpanel/create/{id}', [LanguageKeywordController::class, 'create'])
        ->name('language-keyword-for-adminpanel.create');
    Route::get('language-keyword-for-frontend/frontend-create/{id}', [LanguageKeywordController::class, 'frontend_create'])
        ->name('language-keyword-for-frontend.frontend_create');

    Route::post('menu-keyword', [LanguageKeywordController::class, 'store_menu_keyword'])->name('menu-keyword.store_menu_keyword');
    Route::put('menu-keyword/{id}', [LanguageKeywordController::class, 'update_menu_keyword'])->name('menu-keyword.update_menu_keyword');

    Route::post('content-one-group-keyword', [LanguageKeywordController::class, 'store_content_one_group_keyword'])->name('content-one-group-keyword.store_content_one_group_keyword');
    Route::put('content-one-group-keyword/{id}', [LanguageKeywordController::class, 'update_content_one_group_keyword'])->name('content-one-group-keyword.update_content_one_group_keyword');

    Route::post('content-two-group-keyword', [LanguageKeywordController::class, 'store_content_two_group_keyword'])->name('content-two-group-keyword.store_content_two_group_keyword');
    Route::put('content-two-group-keyword/{id}', [LanguageKeywordController::class, 'update_content_two_group_keyword'])->name('content-two-group-keyword.update_content_two_group_keyword');

    Route::post('content-three-group-keyword', [LanguageKeywordController::class, 'store_content_three_group_keyword'])->name('content-three-group-keyword.store_content_three_group_keyword');
    Route::put('content-three-group-keyword/{id}', [LanguageKeywordController::class, 'update_content_three_group_keyword'])->name('content-three-group-keyword.update_content_three_group_keyword');

    Route::post('content-four-group-keyword', [LanguageKeywordController::class, 'store_content_four_group_keyword'])->name('content-four-group-keyword.store_content_four_group_keyword');
    Route::put('content-four-group-keyword/{id}', [LanguageKeywordController::class, 'update_content_four_group_keyword'])->name('content-four-group-keyword.update_content_four_group_keyword');

    Route::post('content-five-group-keyword', [LanguageKeywordController::class, 'store_content_five_group_keyword'])->name('content-five-group-keyword.store_content_five_group_keyword');
    Route::put('content-five-group-keyword/{id}', [LanguageKeywordController::class, 'update_content_five_group_keyword'])->name('content-five-group-keyword.update_content_five_group_keyword');

    Route::post('content-six-group-keyword', [LanguageKeywordController::class, 'store_content_six_group_keyword'])->name('content-six-group-keyword.store_content_six_group_keyword');
    Route::put('content-six-group-keyword/{id}', [LanguageKeywordController::class, 'update_content_six_group_keyword'])->name('content-six-group-keyword.update_content_six_group_keyword');

    Route::post('frontend-one-group-keyword', [LanguageKeywordController::class, 'store_frontend_one_group_keyword'])->name('frontend-one-group-keyword.store_frontend_one_group_keyword');
    Route::put('frontend-one-group-keyword/{id}', [LanguageKeywordController::class, 'update_frontend_one_group_keyword'])->name('frontend-one-group-keyword.update_frontend_one_group_keyword');

    Route::post('frontend-two-group-keyword', [LanguageKeywordController::class, 'store_frontend_two_group_keyword'])->name('frontend-two-group-keyword.store_frontend_two_group_keyword');
    Route::put('frontend-two-group-keyword/{id}', [LanguageKeywordController::class, 'update_frontend_two_group_keyword'])->name('frontend-two-group-keyword.update_frontend_two_group_keyword');


    Route::get('language-keyword-for-frontend/create/{id}', [LanguageKeywordController::class, 'create_frontend'])
        ->name('language-keyword-frontend.create_frontend');

});

Route::middleware(['auth:sanctum', 'verified', 'XSS'])->prefix('admin')->group(function () {
    Route::get('clear-cache', function() {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');
        Artisan::call('config:clear');
        Artisan::call('view:clear');
        return redirect()->route('dashboard')
            ->with('success','content.created_successfully');
    });
});

Route::any('{catchall}', [ErrorPageController::class, 'not_found'])->where('catchall', '.*');




