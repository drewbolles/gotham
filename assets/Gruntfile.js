module.exports = function(grunt) {

  require('load-grunt-tasks')(grunt);

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    sass: {
      dist: {
        options: {
          style: 'compressed',
        },
        files: {
          'css/screen.css': 'sass/screen.scss',
        }
      }
    },
    autoprefixer: {
      dist: {
        files: {
          'css/screen.css': 'css/screen.css'
        }
      }
    },
    cssmin: {
      combine: {
        files: {
          'css/screen.css': ['css/screen.css']
        }
      }
    },
    compass: {
      dist: {                   // Target
        options: {              // Target options
          sassDir: 'sass',
          cssDir: 'css',
          outputStyle: 'compressed',
        }
      }
    },
    uglify: {
      dist: {
        files: {
          'js/scripts.min.js': ['js/scripts.js']
        }
      }
    },
    watch: {
      sass: {
        files: ['**/*.scss'],
        tasks: ['sass', 'autoprefixer', 'cssmin'],
      },
      uglify: {
        files: ['js/scripts.js'],
        tasks: ['uglify'],
      }
    }
  });

  // Load the plugin that provides the "uglify" task.

  // Default task(s).
  grunt.registerTask('default', ['sass', 'autoprefixer', 'cssmin', 'uglify', 'watch']);

};
