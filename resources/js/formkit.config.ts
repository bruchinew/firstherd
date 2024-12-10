import { en } from "@formkit/i18n";
import { defaultConfig } from "@formkit/vue";
import { generateClasses } from "@formkit/themes";

const textClassification = {
    label: "block mb-0.5 font-medium font-launchtype text-xs formkit-invalid:text-red-500",
    inner: "border flex focus-within:border-red-500 focus-within:bg-gray-50 bg-gray-100/75 border-red-500 focus-within:ring-4 focus-within:ring-red-100 formkit-invalid:ring-red-100 formkit-invalid:border-red-400 rounded-3xl",
    input: "w-full px-3 focus:outline-none focus:ring-0 outline-none text-sm focus-visible:outline-none border-none text-gray-700 formkit-invalid:text-red-600 bg-transparent placeholder:font-launchtype placeholder-slate-400 rounded-xl",
};
const boxClassification = {
    fieldset: "max-w-md border border-gray-300 px-2 pb-1",
    legend: "font-medium font-launchtype text-sm",
    wrapper: "flex items-center mb-1 cursor-pointer",
    help: "mb-2",
    options: "grid grid-cols-2 items-center justify-center gap-x-6 gap-y-2",
    input: "cursor-pointer appearance-none h-5 w-5 me-2 border border-gray-300 bg-gray-100/75 rounded-none checked:bg-red-500 checked:text-red-700 focus:outline-none focus:ring-0 transition duration-200",
    label: "font-normal select-none font-launchtype text-sm mt-2",
};
const buttonClassification = {
    wrapper: "flex mb-1 justify-end mt-4",
    input: "px-4 w-auto py-2 bg-red-500 text-white hover:bg-red-600 focus:ring-red-500 focus:ring-4 outline-none focus:ring-brand-100",
};

export default defaultConfig({
    locales: { en },
    locale: "en",

    config: {
        classes: generateClasses({
            global: {
                outer: "text-start formkit-disabled:opacity-50",
                label: "block mb-0.5 text-sm font-bold",
                help: "text-xs text-gray-500",
                messages: "list-none p-0 mt-0.5 mb-0",
                message: "text-red-500 mb-0.5 text-xs",
                prefixIcon:
                    "flex items-center py-2 px-3 shrink-0 w-10 bg-white border-e text-gray-700",
                suffixIcon:
                    "flex items-center py-2 px-3 shrink-0 w-10 bg-white border-s text-gray-700",
            },
            button: buttonClassification,
            color: {
                label: "block mb-1 font-bold text-sm",
                input: "w-16 h-8 appearance-none cursor-pointer border border-gray-300 rounded-md mb-2 p-1",
            },
            date: textClassification,
            "datetime-local": textClassification,
            checkbox: boxClassification,
            email: textClassification,
            file: {
                label: "block mb-1 font-bold text-sm",
                outer: "w-full overflow-hidden",
                noFiles: "block text-gray-800 text-sm mb-1",
                fileItem: "flex border p-2 rounded text-gray-800 text-sm mb-1",
                fileRemove: "ms-2 text-red-500 relative text-sm",
            },
            month: textClassification,
            number: textClassification,
            password: textClassification,
            radio: boxClassification,
            range: {
                inner: "max-w-md",
                input: "form-range appearance-none w-full h-2 p-0 bg-gray-200 rounded-full focus:outline-none focus:ring-0 focus:shadow-none",
            },
            search: textClassification,
            select: textClassification,
            submit: buttonClassification,
            tel: textClassification,
            text: textClassification,
            textarea: {
                ...textClassification,
                input: `${textClassification.input} block w-full h-32 px-3`,
            },
            time: textClassification,
            url: textClassification,
            week: textClassification,
            model_select: textClassification,
            wysiwyg: {
                ...textClassification,
                inner: `${textClassification.inner} !block`,
            },
        }),
    },
});
