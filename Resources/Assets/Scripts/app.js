// src/app.js
import Modular from './util/main';
import * as modules from './modules';

const app = new Modular({
    modules: modules
});
app.init(app);
