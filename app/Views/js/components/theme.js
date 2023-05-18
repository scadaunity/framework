export const toDarkMode = () => {
    localStorage.theme = 'dark';
    updateTheme();
}

export const toLightMode = () => {
    localStorage.theme = 'light';
    updateTheme();
}
 
export const toSystemMode = () => {
    localStorage.theme = 'system';
    updateTheme();
}

export const updateTheme = () => {

    if (localStorage.getItem("theme") === null) {
        localStorage.theme = 'system';
    }
}

updateTheme();


    /*  
    if (
        localStorage.getItem('color-theme') === 'dark' ||
        (!('color-theme' in localStorage) && window.matchMedia('(prefers-color-scheme: dark)').matches)
    ) {
        document.documentElement.classList.add('dark')
    } else {
        document.documentElement.classList.remove('dark')
    }
    */

    