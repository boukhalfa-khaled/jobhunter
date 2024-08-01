<x-app-layout>
    <section class="container mx-auto px-5 min-h-screen  flex  justify-center items-center mt-20 ">
        <x-forms.form method="POST" action="{{ route('listings.post') }}" enctype="multipart/form-data">

        <x-forms.heading> Post A Job </x-forms.heading>

        <x-forms.input label="Title" name="title" placeholder="Computer Hardware Enginear"  />
        <x-forms.input label="Salary" name="salary" placeholder="150,000"  />
        <x-forms.input label="Location" name="location"  placeholder="Agleria Agliers"/>
        <x-forms.input label="Schedule" name="schedule"  placeholder="FULL TIME"/>
        <x-forms.input label="URL" name="apply_link"  placeholder="http://website.com/jobs/apply"/>
        <x-forms.input label="Tags" name="tags"  placeholder="tags seprated by comma , "/>
        <x-forms.label class="my-4" label="Content ( Markdown is accepted )" name="content"  />
        <textarea class="bg-background p-2  w-full" name="content" id="content" cols="30" rows="10"></textarea>




            <x-forms.button> Post A Job </x-forms.button>
        </x-forms.form>
    </section>

  </x-app-layout>