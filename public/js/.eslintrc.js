module.exports = {
    "extends": "eslint:recommended",
    "env": {
        "browser": true,
        "es6": true,
        "jquery": true,
        "node": true,
        "commonjs": true
    },
    "parserOptions": {
        "ecmaFeatures": {
            "jsx": true
        },
        "sourceType": "module"
    },
    "rules": {
        "indent": [
            "error",
            "tab"
        ],
        "linebreak-style": [
            "error",
            "unix"
        ],
        "quotes": [1, "single"],
        // "quotes": [
        //     "warning",
        //     "single"
        // ],
        "semi": [
            "error",
            "always"
        ]
    }
};