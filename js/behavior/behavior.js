// Buttons

import * as buttons from "./buttons.js";

window.onHomeClicked = buttons.goToHome;
window.onRegisterClicked = buttons.goToRegister;
window.onFeatureMultiplayerClicked = buttons.goToFeatureMultiplayer;
window.onFeatureAnalyticsClicked = buttons.goToFeatureAnalytics;
window.onFeatureLiveOpsClicked = buttons.goToFeatureLiveOps;
window.onPricingClicked = buttons.goToPricing;
window.onDocsClicked = buttons.goToDocs;

// Footer

import * as footer from "./footer.js";

window.onContactSent = footer.sendContactMessage;