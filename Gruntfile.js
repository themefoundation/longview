/*global module:false*/
module.exports = function(grunt) {
	grunt.initConfig({

		sass: {
	        options: {
	            style: 'expanded',
	            sourceMap: true
	        },
	        dist: {
	            files: {
	                'style.css': 'sass/style.scss',
	                'editor-style.css': 'sass/editor-style.scss'
	            }
	        }
		},

		sassdoc: {
			default: {
				src: 'sass/*',
				dest: 'docs'
			},
		},

		jshint: {
			files: ['Gruntfile.js', 'js/*.js'],
			options: {
				globals: {
					jQuery: true
				}
			}
		},

		jscs: {
		    src: ['Gruntfile.js', 'js/*.js'],
		    options: {
		        // verbose: true, // If you need output with rule names http://jscs.info/overview.html#verbose
		        preset: "wordpress"
		    }
		},

		watch: {
			// grunt: { files: ['Gruntfile.js'] },

			sass: {
				files: 'sass/*.scss',
				tasks: ['sass']
			}
		},

		// grunt-wp-i18n by Brady Vercher: https://github.com/blazersix/grunt-wp-i18n
		makepot: {
			target: {
				options: {
					domainPath: '/languages', // Where to save the POT file.
					mainFile: 'style.css', // Main project file.
					type: 'wp-theme' // Type of project (wp-plugin or wp-theme).
				}
			}
		}

	});

	// grunt.registerTask( 'default', ['watch'] );
	grunt.loadNpmTasks('grunt-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');
	grunt.loadNpmTasks('grunt-sassdoc');
	grunt.loadNpmTasks('grunt-contrib-jshint');
	grunt.loadNpmTasks('grunt-jscs');
	grunt.registerTask('default', ['watch']);


	// grunt.registerTask("default", ["jshint"]);
};