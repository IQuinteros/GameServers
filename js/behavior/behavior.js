// Buttons

import * as buttons from "./buttons.js";

window.onHomeClicked = buttons.goToHome;
window.onRegisterClicked = buttons.goToRegister;
window.onFeatureMultiplayerClicked = buttons.goToFeatureMultiplayer;
window.onFeatureAnalyticsClicked = buttons.goToFeatureAnalytics;
window.onFeatureLiveOpsClicked = buttons.goToFeatureLiveOps;
window.onPricingClicked = buttons.goToPricing;
window.onDocsClicked = buttons.goToDocs;
window.toggleMobileNav = buttons.toggleMobileNav;
window.toggleFeaturesNav = buttons.toggleFeaturesNav;
window.onProfileClicked = buttons.goToProfile;

// Footer

import * as footer from "./footer.js";

window.onContactSent = footer.sendContactMessage;

// Docs

import * as docs from "./docs_feedback.js";

window.rateDoc = docs.rateDoc;
window.toggleAsideDoc = docs.toggleAsideDoc;

// Register

import * as register from "./register.js";

window.onRegisterSubmit = register.onRegisterSubmit;