module.exports = function(grunt) {

  require('load-grunt-tasks')(grunt);

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    compass: {
      dist: {
        options: {
          config: 'config.rb'
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
    uglify: {
      dist: {
        files: {
          'js/scripts.min.js': ['js/scripts.js']
        }
      }
    },
    watch: {
      sass: {
        files: ['**/*.sass'],
        tasks: ['compass', 'autoprefixer'],
      },
      uglify: {
        files: ['js/scripts.js'],
        tasks: ['uglify'],
      }
    }
  });

  // Load the plugin that provides the "uglify" task.

  // Default task(s).
  grunt.registerTask('default', ['compass', 'autoprefixer', 'uglify', 'watch']);

};
