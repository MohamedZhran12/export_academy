<html ng-app="app" ng-controller="MainCtrl">
{{editor.content}}

<rich-text-editor options="editor.options" ng-model="editor.content"></rich-text-editor>

<rich-text-editor options="editor.options" ng-model="editor.content"></rich-text-editor>
</html>

<script>
    "use strict"
    angular.module("app", []);

    angular.module('app').directive("richTextEditor", [function () {
        return {
            restrict: 'AE',
            require: 'ngModel',
            scope: {
                options: '='
            },
            link: function ($scope, elem, attrs, ngModel) {
                console.log("Linking directive and replacing element with CKEditor");
                console.log((CKEDITOR.env.isCompatible) ? 'Browser supported by CKEditor.' : 'Browser not supported by CKEditor.');

                CKEDITOR.verbosity = CKEDITOR.VERBOSITY_ERROR;
                CKEDITOR.error = function (errorCode, additional) {
                    console.error("CKEditor Error Code: ", errorCode)
                    console.error("CKEditor Error detail: ", additional);
                }

                var editor = CKEDITOR.replace(elem[0], $scope.options);

                function logEvent(evt) {
                    console.log(evt.editor.name + "  " + evt.name, evt);
                }

                editor.on('loaded', logEvent);
                editor.on('instanceReady', logEvent);

                console.log("Binding CKEditor updates to ngModel");

                function updateModel() {
                    if (ngModel.$viewValue !== undefined) {
                        $scope.$applyAsync(function () {
                            ngModel.$setViewValue(editor.getData());
                        });
                    }
                }

                editor.on('change', updateModel);
                editor.on('key', updateModel);

                console.log("Binding ngModel.$render to update CKEditor")
                ngModel.$render = function () {
                    editor.setData(ngModel.$viewValue, {
                        noSnapshot: true,
                        callback: function () {
                            editor.fire('updateSnapshot');
                        }
                    });
                };

                $scope.$on("$destroy", function () {
                    console.log("Destroying CKEditor " + editor.name);
                    editor.removeAllListeners();
                    editor.destroy(false);
                    editor = undefined;
                });
            }
        }
    }]);

    angular.module('app').controller("MainCtrl", [
        "$scope",
        "$rootScope",
        function ($scope, $rootScope) {
            $scope.editor = {
                content: "<p>Some <b>example</b> text.</p>",
                options: {
                    language: "en",
                    allowedContent: false,
                    entities: false,
                    enterMode: 2,
                    shiftEnterMode: 1,
                    height: 250,
                    toolbarCanCollapse: true,
                    extraPlugins: 'justify,tableresize',
                    toolbar: [
                        {name: "format", items: ["Bold", "Italic", "Underline"]},
                        {name: 'align', items: ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock']},
                        {
                            name: "paragraph",
                            items: ["BulletedList", "NumberedList", "Indent"]
                        },
                        {name: "insert", items: ["Link", "Image"]},
                        {name: "table", items: ["Table"]},
                        {name: "tools", items: ["Maximize"]}
                    ]
                }
            };
        }
    ]);

    angular.module('app').factory("$exceptionHandler", function () {
        return function (ex) {
            console.error(ex);
        };
    });

</script>